<?php

namespace App\Tests\Unit\Factory;

use App\Entity\Card;

class CardFactory
{
    public static function createCard(): Card
    {
        return new Card();
    }
}
