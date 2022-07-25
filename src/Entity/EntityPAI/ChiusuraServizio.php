<?php

namespace App\Entity;

use App\Repository\ChiusuraServizioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChiusuraServizioRepository::class)]
#[ORM\Table(name: 'SCHEDA_PAI_chiusura_servizio')]

class ChiusuraServizio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $nome;

    #[ORM\Column(type: 'text')]
    private $conclusioni;

    #[ORM\Column(type: 'date')]
    private $dataValutazione;

    #[ORM\Column(type: 'text')]
    private $firmaOperatore;

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

    public function getConclusioni(): ?string
    {
        return $this->conclusioni;
    }

    public function setConclusioni(string $conclusioni): self
    {
        $this->conclusioni = $conclusioni;

        return $this;
    }

    public function getDataValutazione(): ?\DateTimeInterface
    {
        return $this->dataValutazione;
    }

    public function setDataValutazione(\DateTimeInterface $dataValutazione): self
    {
        $this->dataValutazione = $dataValutazione;

        return $this;
    }

    public function getFirmaOperatore(): ?string
    {
        return $this->firmaOperatore;
    }

    public function setFirmaOperatore(string $firmaOperatore): self
    {
        $this->firmaOperatore = $firmaOperatore;

        return $this;
    }
}
