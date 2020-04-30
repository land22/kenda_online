<?php

namespace App\Repository;

use App\Entity\KenUsers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KenUsers|null find($id, $lockMode = null, $lockVersion = null)
 * @method KenUsers|null findOneBy(array $criteria, array $orderBy = null)
 * @method KenUsers[]    findAll()
 * @method KenUsers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KenUsersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KenUsers::class);
    }

    // /**
    //  * @return KenUsers[] Returns an array of KenUsers objects
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
    public function findOneBySomeField($value): ?KenUsers
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
