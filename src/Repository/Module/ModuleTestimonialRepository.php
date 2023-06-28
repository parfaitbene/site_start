<?php

namespace App\Repository\Module;

use App\Entity\Module\ModuleTestimonial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ModuleTestimonial|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModuleTestimonial|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModuleTestimonial[]    findAll()
 * @method ModuleTestimonial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModuleTestimonialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModuleTestimonial::class);
    }

    // /**
    //  * @return ModuleTestimonial[] Returns an array of ModuleTestimonial objects
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
    public function findOneBySomeField($value): ?ModuleTestimonial
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
