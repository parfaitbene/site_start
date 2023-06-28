<?php

namespace App\Repository\Module;

use App\Entity\Module\Module1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Module1|null find($id, $lockMode = null, $lockVersion = null)
 * @method Module1|null findOneBy(array $criteria, array $orderBy = null)
 * @method Module1[]    findAll()
 * @method Module1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Module1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Module1::class);
    }

    // /**
    //  * @return Module1[] Returns an array of Module1 objects
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
    public function findOneBySomeField($value): ?Module1
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
