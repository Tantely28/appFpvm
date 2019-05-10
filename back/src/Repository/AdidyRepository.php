<?php

namespace App\Repository;

use App\Entity\Adidy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Adidy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Adidy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Adidy[]    findAll()
 * @method Adidy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdidyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Adidy::class);
    }

    // /**
    //  * @return Adidy[] Returns an array of Adidy objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Adidy
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
