<?php

namespace App\Repository;

use App\Entity\EntityPAI\SchedaPAI;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SchedaPAI>
 *
 * @method SchedaPAI|null find($id, $lockMode = null, $lockVersion = null)
 * @method SchedaPAI|null findOneBy(array $criteria, array $orderBy = null)
 * @method SchedaPAI[]    findAll()
 * @method SchedaPAI[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchedaPAIRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SchedaPAI::class);
    }

    public function add(SchedaPAI $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SchedaPAI $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function contaSchedePai(): int
    {
        return $this->createQueryBuilder('s')
        ->select('count(s.id)')
        ->getQuery()
        ->getSingleScalarResult();

    }


    public function findUserSchedePai(int $idUser): array
    {
        return $this->createQueryBuilder('s')

        ->leftJoin('s.idOperatoreSecondarioInf', 's1')
        ->leftJoin('s.idOperatoreSecondarioTdr', 's2')
        ->leftJoin('s.idOperatoreSecondarioLog', 's3')
        ->leftJoin('s.idOperatoreSecondarioAsa', 's4')
        ->leftJoin('s.idOperatoreSecondarioOss', 's5')
        ->Where('s.idOperatorePrincipale = :id')
        ->orWhere('s1.id = :id')
        ->orWhere('s2.id = :id')
        ->orWhere('s3.id = :id')
        ->orWhere('s4.id = :id')
        ->orWhere('s5.id = :id')
        ->setParameter('id', $idUser)
        ->orderBy('s.id','ASC')
        ->getQuery()
        ->getResult();
        
    }

    public function selectStatoSchedePai(string $stato): array
    {
        return $this->createQueryBuilder('s')

        ->Where('s.currentPlace = :stato')
        ->setParameter('stato', $stato)
        ->getQuery()
        ->getResult();
        
    }

//    /**
//     * @return SchedaPAI[] Returns an array of SchedaPAI objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SchedaPAI
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
