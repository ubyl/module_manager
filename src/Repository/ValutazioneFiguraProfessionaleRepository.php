<?php

namespace App\Repository;

use App\Entity\EntityPAI\ValutazioneFiguraProfessionale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ValutazioneFiguraProfessionale>
 *
 * @method ValutazioneFiguraProfessionale|null find($id, $lockMode = null, $lockVersion = null)
 * @method ValutazioneFiguraProfessionale|null findOneBy(array $criteria, array $orderBy = null)
 * @method ValutazioneFiguraProfessionale[]    findAll()
 * @method ValutazioneFiguraProfessionale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValutazioneFiguraProfessionaleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ValutazioneFiguraProfessionale::class);
    }

    public function add(ValutazioneFiguraProfessionale $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ValutazioneFiguraProfessionale $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ValutazioneFiguraProfessionale[] Returns an array of ValutazioneFiguraProfessionale objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ValutazioneFiguraProfessionale
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
