<?php

namespace App\Entity;

use App\Repository\BradenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BradenRepository::class)]
class Braden
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $nome;

    #[ORM\Column(type: 'integer')]
    private $percezioneSensoriale;

    #[ORM\Column(type: 'integer')]
    private $umidità;

    #[ORM\Column(type: 'integer')]
    private $attività;

    #[ORM\Column(type: 'integer')]
    private $mobilità;

    #[ORM\Column(type: 'integer')]
    private $nutrizione;

    #[ORM\Column(type: 'integer')]
    private $frizioneScivolamento;

    #[ORM\Column(type: 'date')]
    private $dataValutazione;

    #[ORM\Column(type: 'integer')]
    private $totale;

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

    public function getPercezioneSensoriale(): ?int
    {
        return $this->percezioneSensoriale;
    }

    public function setPercezioneSensoriale(int $percezioneSensoriale): self
    {
        $this->percezioneSensoriale = $percezioneSensoriale;

        return $this;
    }

    public function getUmidità(): ?int
    {
        return $this->umidità;
    }

    public function setUmidità(int $umidità): self
    {
        $this->umidità = $umidità;

        return $this;
    }

    public function getAttività(): ?int
    {
        return $this->attività;
    }

    public function setAttività(int $attività): self
    {
        $this->attività = $attività;

        return $this;
    }

    public function getMobilità(): ?int
    {
        return $this->mobilità;
    }

    public function setMobilità(int $mobilità): self
    {
        $this->mobilità = $mobilità;

        return $this;
    }

    public function getNutrizione(): ?int
    {
        return $this->nutrizione;
    }

    public function setNutrizione(int $nutrizione): self
    {
        $this->nutrizione = $nutrizione;

        return $this;
    }

    public function getFrizioneScivolamento(): ?int
    {
        return $this->frizioneScivolamento;
    }

    public function setFrizioneScivolamento(int $frizioneScivolamento): self
    {
        $this->frizioneScivolamento = $frizioneScivolamento;

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

    public function getTotale(): ?int
    {
        return $this->totale;
    }

    public function setTotale(int $totale): self
    {
        $this->totale = $totale;

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
