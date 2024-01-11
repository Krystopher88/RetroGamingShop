<?php

namespace App\DataFixtures;

use App\Entity\PlatformsProducts;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PlatformsProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $platForms = [
            'Atari 2600',
            'Nintendo',
            'Master System',
            'Super Nintendo',
            'Mega Drive',
            'PlayStation',
            'Saturn',
            'Nintendo 64',
            'PlayStation 2',
            'Xbox',
            'GameCube',
            'PlayStation Portable',
            'Xbox 360',
            'DS',
            'PlayStation 3',
            'Wii',
            '3DS',
            'PlayStation Vita',
            'Xbox One',
            'PlayStation 4',
            'Switch',
            'Dreamcast',
            'Neo Geo',
            'Commodore 64',
            'Amiga',
        ];

        $faker = Factory::create('fr_FR');

        foreach ($platForms as $platForm) {
            $platformsProducts = new PlatformsProducts();
            $platformsProducts->setName($platForm);
            $platformsProducts->setPictureName($faker->imageUrl(640, 480, 'platformsProducts'));

            $manager->persist($platformsProducts);
        }
        $manager->flush();
    }
}
