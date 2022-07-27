<?php

namespace App\Entity\EntityPAI;

use App\Repository\ParereMMGRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParereMMGRepository::class)]
#[ORM\Table(name: 'SCHEDA_PAI_parere_mmg')]

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
    private $firmaMMG;

    #[ORM\Column(type: 'text')]
    private $firmaUtenteFamigliareCaregiver;

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
        return $this->firmaMMG;
    }

    public function setFirmaMMG(string $firmaMMG): self
    {
        $this->firmaMMG = $firmaMMG;

        return $this;
    }

    public function getFirmaUtenteFamigliareCaregiver(): ?string
    {
        return $this->firmaUtenteFamigliareCaregiver;
    }

    public function setFirmaUtenteFamigliareCaregiver(string $firmaUtenteFamigliareCaregiver): self
    {
        $this->firmaUtenteFamigliareCaregiver = $firmaUtenteFamigliareCaregiver;

        return $this;
    }
}
