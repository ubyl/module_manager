<?php

namespace App\Entity;

use App\Repository\ParereMMGRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParereMMGRepository::class)]
class ParereMMG
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $nome;

    #[ORM\Column(type: 'boolean')]
    private $parere;

    #[ORM\Column(type: 'text', nullable: true)]
    private $descrizione;

    #[ORM\Column(type: 'text')]
    private $firma_MMG;

    #[ORM\Column(type: 'text')]
    private $firma_utente_famigliare_caregiver;

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

    public function isParere(): ?bool
    {
        return $this->parere;
    }

    public function setParere(bool $parere): self
    {
        $this->parere = $parere;

        return $this;
    }

    public function getDescrizione(): ?string
    {
        return $this->descrizione;
    }

    public function setDescrizione(?string $descrizione): self
    {
        $this->descrizione = $descrizione;

        return $this;
    }

    public function getFirmaMMG(): ?string
    {
        return $this->firma_MMG;
    }

    public function setFirmaMMG(string $firma_MMG): self
    {
        $this->firma_MMG = $firma_MMG;

        return $this;
    }

    public function getFirmaUtenteFamigliareCaregiver(): ?string
    {
        return $this->firma_utente_famigliare_caregiver;
    }

    public function setFirmaUtenteFamigliareCaregiver(string $firma_utente_famigliare_caregiver): self
    {
        $this->firma_utente_famigliare_caregiver = $firma_utente_famigliare_caregiver;

        return $this;
    }
}
