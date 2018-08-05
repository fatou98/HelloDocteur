<?php

namespace App\Repository;

use App\Entity\Vsl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Vsl|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vsl|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vsl[]    findAll()
 * @method Vsl[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VslRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Vsl::class);
    }

//    /**
//     * @return Vsl[] Returns an array of Vsl objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vsl
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
