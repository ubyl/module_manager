<?php

namespace App\Repository;

use App\Entity\EntityPAI\ChiusuraServizio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ChiusuraServizio>
 *
 * @method ChiusuraServizio|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChiusuraServizio|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChiusuraServizio[]    findAll()
 * @method ChiusuraServizio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChiusuraServizioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChiusuraServizio::class);
    }

    public function add(ChiusuraServizio $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ChiusuraServizio $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ChiusuraServizio[] Returns an array of ChiusuraServizio objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ChiusuraServizio
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
