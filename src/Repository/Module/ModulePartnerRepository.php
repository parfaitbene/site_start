<?php

namespace App\Repository\Module;

use App\Entity\Module\ModulePartner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ModulePartner|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModulePartner|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModulePartner[]    findAll()
 * @method ModulePartner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModulePartnerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModulePartner::class);
    }

    // /**
    //  * @return ModulePartner[] Returns an array of ModulePartner objects
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
    public function findOneBySomeField($value): ?ModulePartner
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
