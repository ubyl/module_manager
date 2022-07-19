<?php

namespace App\Entity;

use App\Repository\ValutazioneGeneraleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ValutazioneGeneraleRepository::class)]
class ValutazioneGenerale
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $nome;

    #[ORM\Column(type: 'date')]
    private $data_valutazione;

    #[ORM\Column(type: 'integer')]
    private $n_componenti_nucleo_abitativo;

    #[ORM\Column(type: 'boolean')]
    private $rischio_infettivo;

    #[ORM\Column(type: 'text')]
    private $diagnosi;

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

    public function getDataValutazione(): ?\DateTimeInterface
    {
        return $this->data_valutazione;
    }

    public function setDataValutazione(\DateTimeInterface $data_valutazione): self
    {
        $this->data_valutazione = $data_valutazione;

        return $this;
    }

    public function getNComponentiNucleoAbitativo(): ?int
    {
        return $this->n_componenti_nucleo_abitativo;
    }

    public function setNComponentiNucleoAbitativo(int $n_componenti_nucleo_abitativo): self
    {
        $this->n_componenti_nucleo_abitativo = $n_componenti_nucleo_abitativo;

        return $this;
    }

    public function isRischioInfettivo(): ?bool
    {
        return $this->rischio_infettivo;
    }

    public function setRischioInfettivo(bool $rischio_infettivo): self
    {
        $this->rischio_infettivo = $rischio_infettivo;

        return $this;
    }

    public function getDiagnosi(): ?string
    {
        return $this->diagnosi;
    }

    public function setDiagnosi(string $diagnosi): self
    {
        $this->diagnosi = $diagnosi;

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
