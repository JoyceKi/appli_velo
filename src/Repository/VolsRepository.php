<?php

namespace App\Repository;

use App\Entity\Vols;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Vols>
 *
 * @method Vols|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vols|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vols[]    findAll()
 * @method Vols[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VolsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vols::class);
    }

//    /**
//     * @return Vols[] Returns an array of Vols objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Vols
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

            /**
     * @return Velo[] Returns an array of Velo objects associated with thefts
     */
    public function findStolenBikes()
    {
        return $this->createQueryBuilder('v')
            ->innerJoin('v.vols', 'vl') // Assuming 'vols' is the property in Velo entity that refers to the Vols entity
            ->andWhere('vl.isStolen = :val') // Assuming 'isStolen' is a property in Vols entity that indicates if the bike is stolen
            ->setParameter('val', true)
            ->getQuery()
            ->getResult();
    }
}
