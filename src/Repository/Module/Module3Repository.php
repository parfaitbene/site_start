<?php

namespace App\Repository\Module;

use App\Entity\Module\Module3;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Module3|null find($id, $lockMode = null, $lockVersion = null)
 * @method Module3|null findOneBy(array $criteria, array $orderBy = null)
 * @method Module3[]    findAll()
 * @method Module3[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Module3Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Module3::class);
    }

    // /**
    //  * @return Module3[] Returns an array of Module3 objects
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
    public function findOneBySomeField($value): ?Module3
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
