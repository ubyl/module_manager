<?php

namespace App\Entity\EntityPAI;

use App\Repository\BarthelRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BarthelRepository::class)]
#[ORM\Table(name: 'SCHEDA_PAI_barthel')]

class Barthel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    #[Assert\Type(\DateTime::class)]
    private $dataValutazione;

    #[ORM\Column(type: 'integer')]
    private $alimentazione;

    #[ORM\Column(type: 'integer')]
    private $bagnoDoccia;

    #[ORM\Column(type: 'integer')]
    private $igienePersonale;

    #[ORM\Column(type: 'integer')]
    private $abbigliamento;

    #[ORM\Column(type: 'integer')]
    private $continenzaIntestinale;

    #[ORM\Column(type: 'integer')]
    private $continenzaUrinaria;

    #[ORM\Column(type: 'integer')]
    private $toilet;

    #[ORM\Column(type: 'integer',  nullable: true)]
    private $totaleValutazioneFunzionale;

    #[ORM\Column(type: 'integer')]
    private $trasferimentoLettoSedia;

    #[ORM\Column(type: 'integer')]
    private $scale;

    #[ORM\Column(type: 'boolean')]
    private $deambulazione;

    #[ORM\Column(type: 'integer')]
    private $deambulazioneValida;

    #[ORM\Column(type: 'integer')]
    private $usoCarrozzina;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $totale;

    #[ORM\ManyToOne(targetEntity: SchedaPAI::class, inversedBy: 'idBarthel')]
    private $schedaPAI;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAlimentazione(): ?int
    {
        return $this->alimentazione;
    }

    public function setAlimentazione(int $alimentazione): self
    {
        $this->alimentazione = $alimentazione;

        return $this;
    }

    public function getBagnoDoccia(): ?int
    {
        return $this->bagnoDoccia;
    }

    public function setBagnoDoccia(int $bagnoDoccia): self
    {
        $this->bagnoDoccia = $bagnoDoccia;

        return $this;
    }

    public function getIgienePersonale(): ?int
    {
        return $this->igienePersonale;
    }

    public function setIgienePersonale(int $igienePersonale): self
    {
        $this->igienePersonale = $igienePersonale;

        return $this;
    }

    public function getAbbigliamento(): ?int
    {
        return $this->abbigliamento;
    }

    public function setAbbigliamento(int $abbigliamento): self
    {
        $this->abbigliamento = $abbigliamento;

        return $this;
    }

    public function getContinenzaIntestinale(): ?int
    {
        return $this->continenzaIntestinale;
    }

    public function setContinenzaIntestinale(int $continenzaIntestinale): self
    {
        $this->continenzaIntestinale = $continenzaIntestinale;

        return $this;
    }

    public function getContinenzaUrinaria(): ?int
    {
        return $this->continenzaUrinaria;
    }

    public function setContinenzaUrinaria(int $continenzaUrinaria): self
    {
        $this->continenzaUrinaria = $continenzaUrinaria;

        return $this;
    }

    public function getToilet(): ?int
    {
        return $this->toilet;
    }

    public function setToilet(int $toilet): self
    {
        $this->toilet = $toilet;

        return $this;
    }

    public function getTotaleValutazioneFunzionale(): ?int
    {
        return $this->totaleValutazioneFunzionale;
    }

    public function setTotaleValutazioneFunzionale(int $totaleValutazioneFunzionale): self
    {
        $this->totaleValutazioneFunzionale = $totaleValutazioneFunzionale;

        return $this;
    }

    public function getTrasferimentoLettoSedia(): ?int
    {
        return $this->trasferimentoLettoSedia;
    }

    public function setTrasferimentoLettoSedia(int $trasferimentoLettoSedia): self
    {
        $this->trasferimentoLettoSedia = $trasferimentoLettoSedia;

        return $this;
    }

    public function getScale(): ?int
    {
        return $this->scale;
    }

    public function setScale(int $scale): self
    {
        $this->scale = $scale;

        return $this;
    }

    public function isDeambulazione(): ?bool
    {
        return $this->deambulazione;
    }

    public function setDeambulazione(bool $deambulazione): self
    {
        $this->deambulazione = $deambulazione;

        return $this;
    }

    public function getDeambulazioneValida(): ?int
    {
        return $this->deambulazioneValida;
    }

    public function setDeambulazioneValida(int $deambulazioneValida): self
    {
        $this->deambulazioneValida = $deambulazioneValida;

        return $this;
    }

    public function getUsoCarrozzina(): ?int
    {
        return $this->usoCarrozzina;
    }

    public function setUsoCarrozzina(int $usoCarrozzina): self
    {
        $this->usoCarrozzina = $usoCarrozzina;

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
