<?php

namespace App\Entity;

use App\Enum\CardName;
use App\Enum\CardType;
use App\Repository\CardRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CardRepository::class)]
class Card
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read'])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read'])]
    private ?string $type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(CardName $cardName): self
    {
        $this->name = $cardName->value;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(CardType $cardType): self
    {
        $this->type = $cardType->value;

        return $this;
    }
}
