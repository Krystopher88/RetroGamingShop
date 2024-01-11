<?php

namespace App\Form;

use App\Entity\PlatformsProducts;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductsPlatformType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', EntityType::class, [
                'class' => PlatformsProducts::class,
                'choice_label' => 'name',
                'required' => false,
                'placeholder' => 'Sélectionnez une plateforme existante',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PlatformsProducts::class,
        ]);
    }
}
