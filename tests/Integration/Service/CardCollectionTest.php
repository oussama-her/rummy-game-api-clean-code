<?php

namespace App\Tests\Integration\Service;

use App\Entity\Card;
use App\Repository\CardRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CardCollectionTest extends KernelTestCase
{
    private ContainerInterface $serviceContainer;
    public function setUp(): void
    {
        self::bootKernel();

        // (2) use static::getContainer() to access the service container
        $this->serviceContainer = static::getContainer();
    }

    public function testPickCardsResultType(): void
    {
        $cardRepository = $this->serviceContainer->get(CardRepositoryInterface::class);
        $this->assertInstanceOf(
            Card::class,
            $cardRepository->getRandomCards(1)->first()
        );
    }
}
