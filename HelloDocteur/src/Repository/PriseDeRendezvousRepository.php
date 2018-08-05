<?php

namespace App\Repository;

use App\Entity\PriseDeRendezvous;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PriseDeRendezvous|null find($id, $lockMode = null, $lockVersion = null)
 * @method PriseDeRendezvous|null findOneBy(array $criteria, array $orderBy = null)
 * @method PriseDeRendezvous[]    findAll()
 * @method PriseDeRendezvous[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PriseDeRendezvousRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PriseDeRendezvous::class);
    }

//    /**
//     * @return PriseDeRendezvous[] Returns an array of PriseDeRendezvous objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PriseDeRendezvous
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
