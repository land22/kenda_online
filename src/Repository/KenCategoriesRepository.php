<?php

namespace App\Repository;

use App\Entity\KenCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KenCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method KenCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method KenCategories[]    findAll()
 * @method KenCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KenCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KenCategories::class);
    }

    // /**
    //  * @return KenCategories[] Returns an array of KenCategories objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?KenCategories
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
