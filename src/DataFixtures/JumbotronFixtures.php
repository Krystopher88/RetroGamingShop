<?php

namespace App\DataFixtures;

use App\Entity\Jumbotron;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class JumbotronFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($jmb = 1; $jmb <= 10; $jmb++) {
            $jumbotron = new Jumbotron();
            $jumbotron->setName($faker->word);
            $jumbotron->setDescription($faker->sentence(2));
            $jumbotron->setPictureName($faker->imageUrl(640, 480, 'RetroGamingShop'));
            $isPublish = (bool) rand(0, 1);
            $jumbotron->setIsPublish($isPublish);

            $manager->persist($jumbotron);
        }
        $manager->flush();
    }
}