<?php

namespace App\Repository;

use App\Entity\Had;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Had|null find($id, $lockMode = null, $lockVersion = null)
 * @method Had|null findOneBy(array $criteria, array $orderBy = null)
 * @method Had[]    findAll()
 * @method Had[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HadRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Had::class);
    }

//    /**
//     * @return Had[] Returns an array of Had objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Had
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
