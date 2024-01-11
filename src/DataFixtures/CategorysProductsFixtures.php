<?php

namespace App\DataFixtures;

use App\Entity\CategorysProducts;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorysProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categorysProducts = [
            'Jeux vidéo',
            'Consoles',
            'Accessoires',
            'Goodies',
        ];

        foreach ($categorysProducts as $key => $categorysProduct) {
            $categorysProducts = new CategorysProducts();
            $categorysProducts->setName($categorysProduct);

            $manager->persist($categorysProducts);
        }

        $manager->flush();
    }
}
