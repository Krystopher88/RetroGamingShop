<?php

namespace App\DataFixtures;

use App\Entity\GenresProducts;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GenresProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $genresProducts = [
            'Action',
            'Aventure',
            'RPG (Jeu de rôle)',
            'Stratégie',
            'Simulation',
            'Sport',
            'Course',
            'Puzzle',
            'Horreur',
            'Science-fiction',
            'Fantasy',
            'Plateforme',
            'FPS (First-Person Shooter)',
            'TPS (Third-Person Shooter)',
            'Combat',
            'Musical',
            'Party',
            'Survie',
            'Open World',
            'Rogue-like',
            'Jeux de cartes',
            'Jeux de société',
            'Coopératif',
            'Multijoueur en ligne',
            'Monde ouvert',
            'Exploration',
        ];

        foreach ($genresProducts as $genre) {
            $genresProducts = new GenresProducts();
            $genresProducts->setName($genre);

            $manager->persist($genresProducts);
        }
        $manager->flush();
    }
}
