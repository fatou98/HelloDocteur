<?php

namespace App\Repository;

use App\Entity\TypeStructure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeStructure|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeStructure|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeStructure[]    findAll()
 * @method TypeStructure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeStructureRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeStructure::class);
    }

//    /**
//     * @return TypeStructure[] Returns an array of TypeStructure objects
//     */
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
    public function findOneBySomeField($value): ?TypeStructure
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
