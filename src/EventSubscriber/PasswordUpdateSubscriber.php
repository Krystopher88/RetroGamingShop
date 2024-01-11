<?php

namespace App\EventSubscriber;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PasswordUpdateSubscriber implements EventSubscriberInterface
{
    public function __construct(protected UserPasswordHasherInterface $passwordHasher)
    {
    }

    /**
     * return array<string, string>>.
     */
    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => 'onBeforeEntityPersistedEvent',
            BeforeEntityUpdatedEvent::class => 'onBeforeEntityPersistedEvent',
        ];
    }

    public function onBeforeEntityPersistedEvent(BeforeEntityUpdatedEvent|BeforeEntityPersistedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Users)) {
            return;
        }

        if (!is_null($entity->getPlainPassword()) && !empty($entity->getPlainPassword())) {
            $entity->setPassword(
                $this->passwordHasher->hashPassword($entity, $entity->getPlainPassword()));
        }
    }
}
