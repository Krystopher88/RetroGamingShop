<?php

namespace App\Repository;

use App\Entity\CategorysProducts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategorysProducts>
 *
 * @method CategorysProducts|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorysProducts|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorysProducts[]    findAll()
 * @method CategorysProducts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorysProductsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorysProducts::class);
    }

//    /**
//     * @return CategorysProducts[] Returns an array of CategorysProducts objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CategorysProducts
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
