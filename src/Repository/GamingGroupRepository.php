<?php

namespace App\Repository;

use App\Entity\GamingGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GamingGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method GamingGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method GamingGroup[]    findAll()
 * @method GamingGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GamingGroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GamingGroup::class);
    }

    // /**
    //  * @return GamingGroup[] Returns an array of GamingGroup objects
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
    public function findOneBySomeField($value): ?GamingGroup
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
