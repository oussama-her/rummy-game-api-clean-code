<?php

namespace App\Service;

use App\Entity\Card;
use Doctrine\Common\Collections\ArrayCollection;

interface CardCollectionInterface
{
    /**
     * @param int $randomCardsNumber
     * @return ArrayCollection<int, Card>
     */
    public function pickCards(int $randomCardsNumber): ArrayCollection;
}
