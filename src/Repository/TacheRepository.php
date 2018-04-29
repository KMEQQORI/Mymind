<?php

namespace App\Repository;

use App\Entity\Tache;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class TacheRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tache::class);
    }

    /*
    public function findBySomething($value)
    {

    } return $this->createQueryBuilder('t')
            ->where('t.something = :value')->setParameter('value', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    */


    public function findAllGoal($Goal): array
    {
        return $this->createQueryBuilder('t')
            ->where('t.goal= :goal')->setParameter('goal', $Goal)
            ->getQuery()
            ->getResult()
            ;
    }


    public function findAllCategorie($categorie): array
    {
        return $this->createQueryBuilder('t')
            ->innerJoin('t.goal','g',null,null,null)
            ->where('g.categorie = :categorie')->setParameter('categorie',$categorie)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findAllDoneTache(): array
    {
        return $this->createQueryBuilder('t')
            ->where('t.Pers_Tache= 100')
            ->getQuery()
            ->getResult()
            ;
    }

    public function findAllInProgressTache(): array
    {
        return $this->createQueryBuilder('t')
            ->where('t.Pers_Tache= 0')
            ->getQuery()
            ->getResult()
            ;
    }


}
