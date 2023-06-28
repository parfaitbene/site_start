<?php

namespace App\Repository\Module;

use App\Entity\Module\ModuleMarketingBlock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ModuleMarketingBlock|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModuleMarketingBlock|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModuleMarketingBlock[]    findAll()
 * @method ModuleMarketingBlock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModuleMarketingBlockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModuleMarketingBlock::class);
    }

    // /**
    //  * @return ModuleMarketingBlock[] Returns an array of ModuleMarketingBlock objects
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
    public function findOneBySomeField($value): ?ModuleMarketingBlock
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
