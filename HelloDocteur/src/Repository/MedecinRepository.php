<?php

namespace App\Repository;

use App\Entity\Medecin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Medecin|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medecin|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medecin[]    findAll()
 * @method Medecin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedecinRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Medecin::class);
    }

//    /**
//     * @return Medecin[] Returns an array of Medecin objects
//     */
    
public function findBySpecialiteAndRegion($specialite,$lieu)
{
//$sql='SELECT m FROM App\Entity\Medecin m LEFT JOIN App\Entity\Quartier q LEFT JOIN App\Entity\Region r  WHERE m.Specialite=:specialite and r.id=:lieu';    
$sql='SELECT m FROM App\Entity\Medecin m join m.Quartier q  join q.Region r Where m.Specialite=:specialite and r.id=:lieu';

return $this->getEntityManager()
->createQuery($sql)
->setParameters(array('specialite'=>$specialite,'lieu'=>$lieu))
->execute();
}
public function findBySpecialite($specialite)
{
//$sql='SELECT m FROM App\Entity\Medecin m LEFT JOIN App\Entity\Quartier q LEFT JOIN App\Entity\Region r  WHERE m.Specialite=:specialite and r.id=:lieu';    
$sql='SELECT m FROM App\Entity\Medecin m join m.Quartier q  join q.Region r Where m.Specialite=:specialite';

return $this->getEntityManager()
->createQuery($sql)
->setParameter('specialite',$specialite)
->execute();
}
public function findByRegion($lieu)
{
//$sql='SELECT m FROM App\Entity\Medecin m LEFT JOIN App\Entity\Quartier q LEFT JOIN App\Entity\Region r  WHERE m.Specialite=:specialite and r.id=:lieu';    
$sql='SELECT m FROM App\Entity\Medecin m join m.Quartier q  join q.Region r Where r.id=:lieu';

return $this->getEntityManager()
->createQuery($sql)
->setParameter('lieu',$lieu)
->execute();
}

    /*
    public function findOneBySomeField($value): ?Medecin
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
