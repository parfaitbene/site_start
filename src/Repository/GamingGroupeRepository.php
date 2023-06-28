<?php

namespace App\Repository;

use App\Entity\GamingGroupe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GamingGroupe|null find($id, $lockMode = null, $lockVersion = null)
 * @method GamingGroupe|null findOneBy(array $criteria, array $orderBy = null)
 * @method GamingGroupe[]    findAll()
 * @method GamingGroupe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GamingGroupeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GamingGroupe::class);
    }

    // /**
    //  * @return GamingGroupe[] Returns an array of GamingGroupe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GamingGroupe
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
