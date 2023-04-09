<?php

namespace App\DataFixtures;

use App\Entity\Card;
use App\Enum\CardName;
use App\Enum\CardType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CardFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->loadClubsCards($manager);
        $this->loadDiamondsCards($manager);
        $this->loadHeartsCards($manager);
        $this->loadSpadesCards($manager);
    }


    private function loadClubsCards(ObjectManager $manager): void
    {
        $this->loadCardsByType($manager, CardType::CLUBS);
    }

    private function loadDiamondsCards(ObjectManager $manager): void
    {
        $this->loadCardsByType($manager, CardType::DIAMONDS);
    }

    private function loadHeartsCards(ObjectManager $manager): void
    {
        $this->loadCardsByType($manager, CardType::HEARTS);
    }

    private function loadSpadesCards(ObjectManager $manager): void
    {
        $this->loadCardsByType($manager, CardType::SPADES);
    }

    private function loadCardsByType(ObjectManager $manager, CardType $cardType): void
    {
        foreach (CardName::cases() as $cardName) {
            $card = new Card();
            $card->setName($cardName);
            $card->setType($cardType);
            $manager->persist($card);
        }

        $manager->flush();
    }
}
