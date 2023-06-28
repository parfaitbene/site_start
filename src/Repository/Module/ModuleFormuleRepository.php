<?php

namespace App\Repository\Module;

use App\Entity\Module\ModuleFormule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ModuleFormule|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModuleFormule|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModuleFormule[]    findAll()
 * @method ModuleFormule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModuleFormuleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModuleFormule::class);
    }

    // /**
    //  * @return ModuleFormule[] Returns an array of ModuleFormule objects
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
    public function findOneBySomeField($value): ?ModuleFormule
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
