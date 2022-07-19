<?php

namespace App\Entity;

use App\Repository\ChiusuraServizioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChiusuraServizioRepository::class)]
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
    private $data_valutazione;

    #[ORM\Column(type: 'text')]
    private $firma_operatore;

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
        return $this->data_valutazione;
    }

    public function setDataValutazione(\DateTimeInterface $data_valutazione): self
    {
        $this->data_valutazione = $data_valutazione;

        return $this;
    }

    public function getFirmaOperatore(): ?string
    {
        return $this->firma_operatore;
    }

    public function setFirmaOperatore(string $firma_operatore): self
    {
        $this->firma_operatore = $firma_operatore;

        return $this;
    }
}
