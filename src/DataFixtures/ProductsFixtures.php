<?php

namespace App\DataFixtures;

use App\Entity\Products;
use App\Entity\PicturesProducts;
use App\Entity\PlatformsProducts;
use App\Entity\CategorysProducts;
use App\Entity\GenresProducts;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;


class ProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        
        $pictureReferences = $manager->getRepository(PicturesProducts::class)->findAll();
        $platformReferences = $manager->getRepository(PlatformsProducts::class)->findAll();
        $categoryReferences = $manager->getRepository(CategorysProducts::class)->findAll();
        $genreReferences = $manager->getRepository(GenresProducts::class)->findAll();

        for($p = 1; $p <= 50; $p++) {
            $products = new Products();
            $products->setName($faker->sentence(3));
            $products->setDescription($faker->text(200));
            $products->setPrice($faker->randomFloat(2, 0, 999));
            $products->setStock($faker->numberBetween(0, 100));
            $products->addPicture($faker->randomElement($pictureReferences));
            $products->setPlatform($faker->randomElement($platformReferences)); 
            $products->setCategory($faker->randomElement($categoryReferences));
            $products->setGenre($faker->randomElement($genreReferences));

            $manager->persist($products);
        }
        $manager->flush();
    }

}