<?php

namespace App\Enum;

enum CardType: string
{
    case CLUBS = '♣';
    case DIAMONDS = '♦';
    case HEARTS = '♥';
    case SPADES = '♠';
}
