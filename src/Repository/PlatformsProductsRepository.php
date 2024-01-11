<?php

namespace App\Repository;

use App\Entity\PlatformsProducts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlatformsProducts>
 *
 * @method PlatformsProducts|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlatformsProducts|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlatformsProducts[]    findAll()
 * @method PlatformsProducts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlatformsProductsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlatformsProducts::class);
    }

    //    /**
    //     * @return PlatformsProducts[] Returns an array of PlatformsProducts objects
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

    //    public function findOneBySomeField($value): ?PlatformsProducts
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
