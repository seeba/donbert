<?php

namespace App\Newsletter\Infrastructure\Repository;

use App\Newsletter\Domain\Entity\NewsletterConsent;
use App\Newsletter\Domain\Repository\NewsletterConsentRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @extends ServiceEntityRepository<User>
 *
 * @method NewsletterConsent|null find($id, $lockMode = null, $lockVersion = null)
 * @method NewsletterConsent|null findOneBy(array $criteria, array $orderBy = null)
 * @method NewsletterConsent[]    findAll()
 * @method NewsletterConsent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsletterConsentRepository extends ServiceEntityRepository implements NewsletterConsentRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NewsletterConsent::class);
    }

    public function save(NewsletterConsent $newsletterConsent) :void 
    {
        $this->_em->persist($newsletterConsent);
        $this->_em->flush();
    }
//    /**
//     * @return User[] Returns an array of User objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?User
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}