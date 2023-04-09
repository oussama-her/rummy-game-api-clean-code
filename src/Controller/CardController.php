<?php

namespace App\Controller;

use App\Service\CardCollectionInterface;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpFoundation\Response;

#[Rest\Route('/{version}', name: 'cards')]
class CardController extends AbstractFOSRestController
{
    public function __construct(public CardCollectionInterface $cardCollection)
    {
    }

    #[Rest\Get('/cards', name: 'random_cards_list')]
    #[View(
        statusCode: Response::HTTP_OK,
        serializerGroups: ['read'],
        serializerEnableMaxDepthChecks: false
    )]
    public function getRandomCards(): ArrayCollection
    {
        return $this->cardCollection->pickCards(10);
    }
}
