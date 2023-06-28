<?php

namespace App\Repository\Module;

use App\Entity\Module\ModuleArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ModuleArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModuleArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModuleArticle[]    findAll()
 * @method ModuleArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModuleArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModuleArticle::class);
    }

    // /**
    //  * @return ModuleArticle[] Returns an array of ModuleArticle objects
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
    public function findOneBySomeField($value): ?ModuleArticle
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
