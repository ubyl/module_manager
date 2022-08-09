<?php

namespace App\Entity\EntityPAI;

use App\Repository\AltraTipologiaAssistenzaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AltraTipologiaAssistenzaRepository::class)]
#[ORM\Table(name: 'SCHEDA_PAI_altra_tipologia_assistenza')]

class AltraTipologiaAssistenza
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
