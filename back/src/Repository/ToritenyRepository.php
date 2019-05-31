<?php

namespace App\Repository;

use App\Entity\Toriteny;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Toriteny|null find($id, $lockMode = null, $lockVersion = null)
 * @method Toriteny|null findOneBy(array $criteria, array $orderBy = null)
 * @method Toriteny[]    findAll()
 * @method Toriteny[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ToritenyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Toriteny::class);
    }

    // /**
    //  * @return Toriteny[] Returns an array of Toriteny objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Toriteny
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
