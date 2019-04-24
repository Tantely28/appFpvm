<?php
/**
 * Created by PhpStorm.
 * User: tombo
 * Date: 22/04/2019
 * Time: 21:33
 */

namespace App\Repository;


use App\Entity\Mpiangona;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Mpiangona|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mpiangona|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mpiangona[]    findAll()
 * @method Mpiangona[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MpiangonaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Mpiangona::class);
    }

    public function findM()
    {
        return $this->createQueryBuilder('m')
            ->orderBy('m.idMpiangona', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function login($login,$mdp)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.login = :login')
            ->andWhere('m.mdp = :mdp')
            ->setParameter('login',$login)
            ->setParameter('mdp',$mdp)
            ->getQuery()
            ->getResult();
    }

}