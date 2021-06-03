<?php

namespace App\Repository;

use App\Entity\CarImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CarImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarImage[]    findAll()
 * @method CarImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarImage::class);
    }

    // /**
    //  * @return CarImage[] Returns an array of CarImage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CarImage
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
