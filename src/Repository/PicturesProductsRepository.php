<?php

namespace App\Repository;

use App\Entity\PicturesProducts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PicturesProducts>
 *
 * @method PicturesProducts|null find($id, $lockMode = null, $lockVersion = null)
 * @method PicturesProducts|null findOneBy(array $criteria, array $orderBy = null)
 * @method PicturesProducts[]    findAll()
 * @method PicturesProducts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PicturesProductsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PicturesProducts::class);
    }

    //    /**
    //     * @return PicturesProducts[] Returns an array of PicturesProducts objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?PicturesProducts
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
