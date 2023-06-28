<?php

namespace App\Repository\Media;

use App\Entity\Media\GalleryMedia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GalleryMedia|null find($id, $lockMode = null, $lockVersion = null)
 * @method GalleryMedia|null findOneBy(array $criteria, array $orderBy = null)
 * @method GalleryMedia[]    findAll()
 * @method GalleryMedia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GalleryMediaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GalleryMedia::class);
    }

    // /**
    //  * @return GalleryMedia[] Returns an array of GalleryMedia objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GalleryMedia
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
