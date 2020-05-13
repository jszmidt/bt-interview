<?php

namespace App\Repository;

use App\Entity\BinaryNodeData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BinaryNodeData|null find($id, $lockMode = null, $lockVersion = null)
 * @method BinaryNodeData|null findOneBy(array $criteria, array $orderBy = null)
 * @method BinaryNodeData[]    findAll()
 * @method BinaryNodeData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BinaryNodeDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BinaryNodeData::class);
    }

    // /**
    //  * @return BinaryNodeData[] Returns an array of BinaryNodeData objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BinaryNodeData
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
