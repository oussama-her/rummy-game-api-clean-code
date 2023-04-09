<?php

namespace App\Tests\Unit\Entity;

use App\Enum\CardName;
use App\Enum\CardType;
use App\Tests\Unit\Factory\CardFactory;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    public function testSetCardType(): void
    {
        $card = CardFactory::createCard();

        $card->setType(CardType::CLUBS);

        $this->assertEquals(CardType::CLUBS->value, $card->getType());
    }


    public function testSetCardName(): void
    {
        $card = CardFactory::createCard();

        $card->setName(CardName::KING);

        $this->assertEquals(CardName::KING->value, $card->getName());
    }
}
