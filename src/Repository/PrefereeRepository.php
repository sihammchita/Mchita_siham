<?php

namespace App\Repository;

use App\Entity\Preferee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Preferee>
 *
 * @method Preferee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Preferee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Preferee[]    findAll()
 * @method Preferee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrefereeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Preferee::class);
    }

//    /**
//     * @return Preferee[] Returns an array of Preferee objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Preferee
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
