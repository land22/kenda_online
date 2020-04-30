<?php

namespace App\Repository;

use App\Entity\KenArticles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KenArticles|null find($id, $lockMode = null, $lockVersion = null)
 * @method KenArticles|null findOneBy(array $criteria, array $orderBy = null)
 * @method KenArticles[]    findAll()
 * @method KenArticles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KenArticlesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KenArticles::class);
    }

    // /**
    //  * @return KenArticles[] Returns an array of KenArticles objects
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
    public function findOneBySomeField($value): ?KenArticles
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
