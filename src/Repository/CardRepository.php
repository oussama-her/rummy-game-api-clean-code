<?php

namespace App\Repository;

use App\Entity\Card;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Card>
 */
class CardRepository extends ServiceEntityRepository implements CardRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Card::class);
    }


    private function getRandomCardsQuery(int $randomCardsNumber): Query
    {
        return $this->createQueryBuilder('card')
            ->orderBy('RAND()')
            ->setMaxResults($randomCardsNumber)
            ->getQuery();
    }

    /**
     * @param int $randomCardsNumber
     * @return ArrayCollection<int,Card>
     */
    public function getRandomCards(int $randomCardsNumber): ArrayCollection
    {
        return new ArrayCollection(
            $this->getRandomCardsQuery($randomCardsNumber)
            ->getResult()
        );
    }
}
