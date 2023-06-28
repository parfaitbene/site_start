<?php

namespace App\Repository\Module;

use App\Entity\Module\ModuleParallax;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ModuleParallax|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModuleParallax|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModuleParallax[]    findAll()
 * @method ModuleParallax[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModuleParallaxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModuleParallax::class);
    }

    // /**
    //  * @return ModuleParallax[] Returns an array of ModuleParallax objects
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
    public function findOneBySomeField($value): ?ModuleParallax
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
