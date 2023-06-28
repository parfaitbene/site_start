<?php

namespace App\Repository\Module;

use App\Entity\Module\Module2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Module2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Module2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Module2[]    findAll()
 * @method Module2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Module2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Module2::class);
    }

    // /**
    //  * @return Module2[] Returns an array of Module2 objects
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
    public function findOneBySomeField($value): ?Module2
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
