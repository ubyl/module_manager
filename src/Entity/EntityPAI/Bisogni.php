<?php

namespace App\Entity\EntityPAI;

use App\Repository\BisogniRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BisogniRepository::class)]
#[ORM\Table(name: 'SCHEDA_PAI_bisogni')]

class Bisogni
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $nome;

    public function __toString()
    {
        return $this->nome;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

}
