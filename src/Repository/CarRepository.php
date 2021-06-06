<?php

namespace App\Repository;

use App\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Car|null find($id, $lockMode = null, $lockVersion = null)
 * @method Car|null findOneBy(array $criteria, array $orderBy = null)
 * @method Car[]    findAll()
 * @method Car[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

    // /**
    //  * @return Car[] Returns an array of Car objects
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
    public function findOneBySomeField($value): ?Car
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function searchCar($criteria)
    {
        return $this->createQueryBuilder('c')

            ->Where('c.type = :type')
            ->setParameter('type', $criteria['type'])
            ->andWhere('c.fuel = :fuel')
            ->setParameter('fuel', $criteria['fuel'])
            ->andWhere('c.luggage = :luggage')
            ->setParameter('luggage', $criteria['luggage'])
            ->andWhere('c.Places = :Places')
            ->setParameter('Places', $criteria['Places'])
            ->andWhere('c.gearBox = :gearBox')
            ->setParameter('gearBox', $criteria['gearBox'])
            ->getQuery()
            ->getResult()
            ;
    }
}
