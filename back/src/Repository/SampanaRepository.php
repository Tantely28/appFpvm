<?php
/**
 * Created by PhpStorm.
 * User: tombo
 * Date: 23/04/2019
 * Time: 21:05
 */

namespace App\Repository;


use App\Entity\Sampana;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Sampana|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sampana|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sampana[]    findAll()
 * @method Sampana[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SampanaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Sampana::class);
    }

}