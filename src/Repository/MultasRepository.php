<?php

namespace App\Repository;

use App\Entity\Multas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Multas>
 *
 * @method Multas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Multas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Multas[]    findAll()
 * @method Multas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MultasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Multas::class);
    }

//    /**
//     * @return Multas[] Returns an array of Multas objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Multas
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
