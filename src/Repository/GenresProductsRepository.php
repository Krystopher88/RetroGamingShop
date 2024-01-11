<?php

namespace App\Repository;

use App\Entity\GenresProducts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GenresProducts>
 *
 * @method GenresProducts|null find($id, $lockMode = null, $lockVersion = null)
 * @method GenresProducts|null findOneBy(array $criteria, array $orderBy = null)
 * @method GenresProducts[]    findAll()
 * @method GenresProducts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GenresProductsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GenresProducts::class);
    }

    //    /**
    //     * @return GenresProducts[] Returns an array of GenresProducts objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('g.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?GenresProducts
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
