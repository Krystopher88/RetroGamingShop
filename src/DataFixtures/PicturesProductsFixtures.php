<?php

namespace App\DataFixtures;

use App\Entity\PicturesProducts;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;

class PicturesProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($pp = 1; $pp <= 50; $pp++) {
            $picturesProducts = new PicturesProducts();
            $picturesProducts->setPictureName($faker->imageUrl(640, 480, 'RetroGamingShop'));

            $manager->persist($picturesProducts);
        }
        $manager->flush();
    }
}