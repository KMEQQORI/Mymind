<?php

namespace App\Repository;

use App\Entity\NotesPage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NotesPage|null find($id, $lockMode = null, $lockVersion = null)
 * @method NotesPage|null findOneBy(array $criteria, array $orderBy = null)
 * @method NotesPage[]    findAll()
 * @method NotesPage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NotesPageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NotesPage::class);
    }

//    /**
//     * @return NotesPage[] Returns an array of NotesPage objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NotesPage
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
