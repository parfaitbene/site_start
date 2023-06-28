<?php

namespace App\Repository\Module;

use App\Entity\Module\Module4;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Module4|null find($id, $lockMode = null, $lockVersion = null)
 * @method Module4|null findOneBy(array $criteria, array $orderBy = null)
 * @method Module4[]    findAll()
 * @method Module4[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Module4Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Module4::class);
    }

    // /**
    //  * @return Module4[] Returns an array of Module4 objects
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
    public function findOneBySomeField($value): ?Module4
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
