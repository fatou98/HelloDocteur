<?php

namespace App\Repository;

use App\Entity\CreneauItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CreneauItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method CreneauItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method CreneauItem[]    findAll()
 * @method CreneauItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CreneauItemRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CreneauItem::class);
    }

//    /**
//     * @return CreneauItem[] Returns an array of CreneauItem objects
//     */
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
    public function findOneBySomeField($value): ?CreneauItem
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
