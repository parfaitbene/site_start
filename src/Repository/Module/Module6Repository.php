<?php

namespace App\Repository\Module;

use App\Entity\Module\Module6;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Module6|null find($id, $lockMode = null, $lockVersion = null)
 * @method Module6|null findOneBy(array $criteria, array $orderBy = null)
 * @method Module6[]    findAll()
 * @method Module6[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Module6Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Module6::class);
    }

    // /**
    //  * @return Module6[] Returns an array of Module6 objects
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
    public function findOneBySomeField($value): ?Module6
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
