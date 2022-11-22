<?php

namespace App\Repository;

use App\Entity\EntityPAI\Braden;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Braden>
 *
 * @method Braden|null find($id, $lockMode = null, $lockVersion = null)
 * @method Braden|null findOneBy(array $criteria, array $orderBy = null)
 * @method Braden[]    findAll()
 * @method Braden[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BradenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Braden::class);
    }

    public function add(Braden $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Braden $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function contaSchede(): int
    {
        return $this->createQueryBuilder('s')
        ->select('count(s.id)')
        ->getQuery()
        ->getSingleScalarResult();

    }

    public function findByBradenPerScheda($idSchedaPai): int
    {
        return $this->createQueryBuilder('b')
            ->select('count(b.id)')
            ->andWhere('b.schedaPAI = :schedaPaiId')
            ->setParameter('schedaPaiId', $idSchedaPai)
            ->getQuery()
            ->getSingleScalarResult();
    }

//    /**
//     * @return Braden[] Returns an array of Braden objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Braden
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
