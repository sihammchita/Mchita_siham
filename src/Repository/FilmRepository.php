<?php

namespace App\Repository;

use App\Entity\Film;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Film>
 *
 * @method Film|null find($id, $lockMode = null, $lockVersion = null)
 * @method Film|null findOneBy(array $criteria, array $orderBy = null)
 * @method Film[]    findAll()
 * @method Film[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Film::class);
    }

    // Méthode personnalisée pour récupérer les films sortis après une année donnée
    public function findFilmsAfterYear($year)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.anneeSortie > :year')
            ->setParameter('year', $year)
            ->orderBy('f.anneeSortie', 'ASC')
            ->getQuery()
            ->getResult();
    }

  //obtenir tous les films qui ont un acteur principal spécifique
    public function findFilmsByMainActor($actorId)
{
    return $this->createQueryBuilder('f')
        ->innerJoin('f.casting', 'c')
        ->andWhere('c.acteur = :actorId')
        ->andWhere('c.role = :role')
        ->setParameter('actorId', $actorId)
        ->setParameter('role', 'principal')
        ->getQuery()
        ->getResult();
}
}
