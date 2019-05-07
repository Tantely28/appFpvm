<?php


namespace App\Repository;


use App\Entity\Vaovao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Vaovao|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vaovao|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vaovao[]    findAll()
 * @method Vaovao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VaovaoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Vaovao::class);
    }
    public function findVaovao()
    {
        return $this->createQueryBuilder('v')
            ->orderBy('v.idVaovao', 'DESC')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult()
            ;
    }

}