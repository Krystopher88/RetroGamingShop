<?php

namespace App\DataFixtures;

use App\Entity\Coupons;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CouponsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($cpn = 1; $cpn <= 10; ++$cpn) {
            $coupons = new Coupons();
            $coupons->setName($faker->word);
            $coupons->setCode($faker->word);
            $coupons->setDescription($faker->sentence);
            $coupons->setDiscount($faker->numberBetween(5, 50));
            $coupons->setValidity($faker->dateTimeBetween('now', '+1 year'));
            $isValid = (bool) rand(0, 1);
            $coupons->setIsValid($isValid);

            $manager->persist($coupons);
        }
        $manager->flush();
    }
}
