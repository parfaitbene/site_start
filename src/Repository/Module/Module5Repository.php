<?php

namespace App\Repository\Module;

use App\Entity\Module\Module5;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Module5|null find($id, $lockMode = null, $lockVersion = null)
 * @method Module5|null findOneBy(array $criteria, array $orderBy = null)
 * @method Module5[]    findAll()
 * @method Module5[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Module5Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Module5::class);
    }

    // /**
    //  * @return Module5[] Returns an array of Module5 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Module5
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
