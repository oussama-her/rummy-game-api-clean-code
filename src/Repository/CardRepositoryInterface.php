<?php

namespace App\Repository;

use App\Entity\Card;
use Doctrine\Common\Collections\ArrayCollection;

interface CardRepositoryInterface
{
    /**
     * @param int $randomCardsNumber
     * @return ArrayCollection<int,Card>
     */
    public function getRandomCards(int $randomCardsNumber): ArrayCollection;
}
