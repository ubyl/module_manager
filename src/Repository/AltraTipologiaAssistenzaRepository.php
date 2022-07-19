<?php

namespace App\Repository;

use App\Entity\AltraTipologiaAssistenza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AltraTipologiaAssistenza>
 *
 * @method AltraTipologiaAssistenza|null find($id, $lockMode = null, $lockVersion = null)
 * @method AltraTipologiaAssistenza|null findOneBy(array $criteria, array $orderBy = null)
 * @method AltraTipologiaAssistenza[]    findAll()
 * @method AltraTipologiaAssistenza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AltraTipologiaAssistenzaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AltraTipologiaAssistenza::class);
    }

    public function add(AltraTipologiaAssistenza $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(AltraTipologiaAssistenza $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return AltraTipologiaAssistenza[] Returns an array of AltraTipologiaAssistenza objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AltraTipologiaAssistenza
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
