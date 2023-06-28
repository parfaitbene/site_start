<?php

namespace App\Repository;

use App\Entity\SiteActivity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SiteActivity|null find($id, $lockMode = null, $lockVersion = null)
 * @method SiteActivity|null findOneBy(array $criteria, array $orderBy = null)
 * @method SiteActivity[]    findAll()
 * @method SiteActivity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SiteActivityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SiteActivity::class);
    }

    // /**
    //  * @return SiteActivity[] Returns an array of SiteActivity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SiteActivity
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
