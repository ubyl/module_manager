<?php

namespace App\Entity\EntityPAI;

use App\Entity\EntityPAI\SchedaPAI;
use App\Repository\LesioniRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LesioniRepository::class)]
#[ORM\Table(name: 'SCHEDA_PAI_lesioni')]
class Lesioni
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $nome = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dataRivalutazioniSettimanali = null;

    #[ORM\Column(length: 255)]
    private ?string $tipologiaLesione = null;

    #[ORM\Column(length: 255)]
    private ?string $numeroSedeLesione = null;

    #[ORM\Column(length: 255)]
    private ?string $gradoLesione = null;

    #[ORM\Column(length: 255)]
    private ?string $condizioneLesione = null;

    #[ORM\Column(length: 255)]
    private ?string $bordiLesione = null;

    #[ORM\Column(length: 255)]
    private ?string $cutePerilesionale = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $noteSullaLesione = null;

    #[ORM\ManyToOne(inversedBy: 'idLesioni')]
    private ?SchedaPAI $schedaPAI = null;

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

    public function getDataRivalutazioniSettimanali(): ?\DateTimeInterface
    {
        return $this->dataRivalutazioniSettimanali;
    }

    public function setDataRivalutazioniSettimanali(\DateTimeInterface $dataRivalutazioniSettimanali): self
    {
        $this->dataRivalutazioniSettimanali = $dataRivalutazioniSettimanali;

        return $this;
    }

    public function getTipologiaLesione(): ?string
    {
        return $this->tipologiaLesione;
    }

    public function setTipologiaLesione(string $tipologiaLesione): self
    {
        $this->tipologiaLesione = $tipologiaLesione;

        return $this;
    }

    public function getNumeroSedeLesione(): ?string
    {
        return $this->numeroSedeLesione;
    }

    public function setNumeroSedeLesione(string $numeroSedeLesione): self
    {
        $this->numeroSedeLesione = $numeroSedeLesione;

        return $this;
    }

    public function getGradoLesione(): ?string
    {
        return $this->gradoLesione;
    }

    public function setGradoLesione(string $gradoLesione): self
    {
        $this->gradoLesione = $gradoLesione;

        return $this;
    }

    public function getCondizioneLesione(): ?string
    {
        return $this->condizioneLesione;
    }

    public function setCondizioneLesione(string $condizioneLesione): self
    {
        $this->condizioneLesione = $condizioneLesione;

        return $this;
    }

    public function getBordiLesione(): ?string
    {
        return $this->bordiLesione;
    }

    public function setBordiLesione(string $bordiLesione): self
    {
        $this->bordiLesione = $bordiLesione;

        return $this;
    }

    public function getCutePerilesionale(): ?string
    {
        return $this->cutePerilesionale;
    }

    public function setCutePerilesionale(string $cutePerilesionale): self
    {
        $this->cutePerilesionale = $cutePerilesionale;

        return $this;
    }

    public function getNoteSullaLesione(): ?string
    {
        return $this->noteSullaLesione;
    }

    public function setNoteSullaLesione(?string $noteSullaLesione): self
    {
        $this->noteSullaLesione = $noteSullaLesione;

        return $this;
    }

    public function getSchedaPAI(): ?SchedaPAI
    {
        return $this->schedaPAI;
    }

    public function setSchedaPAI(?SchedaPAI $schedaPAI): self
    {
        $this->schedaPAI = $schedaPAI;

        return $this;
    }


}
