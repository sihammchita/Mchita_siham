<?php

namespace App\Repository;

use App\Entity\Realisteurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Realisteurs>
 *
 * @method Realisteurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Realisteurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Realisteurs[]    findAll()
 * @method Realisteurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RealisteursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Realisteurs::class);
    }

//    /**
//     * @return Realisteurs[] Returns an array of Realisteurs objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Realisteurs
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
