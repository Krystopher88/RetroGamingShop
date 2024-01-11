<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $userPasswordHasherInterface
    ) {
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $admin = new Users();
        $admin->setEmail('admin@retrogamingshop.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->userPasswordHasherInterface->hashPassword($admin, 'admin'));
        $admin->setPictureName($faker->imageUrl(640, 480, 'admin'));
        $admin->setLastname('Doe');
        $admin->setFirstname('John');
        $admin->setDateOfBirth(new \DateTime('1985-11-28'));
        $admin->setAddress('42 rue du guide');
        $admin->setZipcode('42000');
        $admin->setCity('Viltvodle VI');
        $admin->setCountry('France');
        $admin->setIsValid(true);

        $manager->persist($admin);

        for ($usr = 1; $usr <= 10; ++$usr) {
            $users = new Users();
            $users->setEmail($faker->email);
            $users->setPassword(
                $this->userPasswordHasherInterface->hashPassword($users, 'user')
            );
            $users->setPictureName($faker->imageUrl(640, 480, 'user'));
            $users->setLastname($faker->lastName);
            $users->setFirstname($faker->firstName);
            $users->setDateOfBirth(new \DateTime('1985-11-28'));
            $users->setAddress($faker->streetAddress);
            $users->setZipCode(str_replace(' ', '', $faker->postcode));
            $users->setCity($faker->city);
            $users->setCountry($faker->country);
            $isValid = (bool) rand(0, 1);
            $users->setIsValid($isValid);

            $manager->persist($users);
        }
        $manager->flush();
    }
}
