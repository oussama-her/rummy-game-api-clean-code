<?php

namespace App\Service;

use App\Entity\Card;
use App\Repository\CardRepositoryInterface;
use Doctrine\Common\Collections\ArrayCollection;

class CardCollection implements CardCollectionInterface
{
    public function __construct(private CardRepositoryInterface $cardRepository)
    {
    }

    /**
     * @param int $randomCardsNumber
     * @return ArrayCollection<int, Card>
     */
    public function pickCards(int $randomCardsNumber): ArrayCollection
    {
        return $this->cardRepository->getRandomCards($randomCardsNumber);
    }
}
