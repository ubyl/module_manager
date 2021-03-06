<?php

namespace App\Entity;

use App\Repository\ValutazioneFiguraProfessionaleRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Config\TipoOperatore;
use Symfony\Component\Form\Extension\Core\Type\EnumType;

#[ORM\Entity(repositoryClass: ValutazioneFiguraProfessionaleRepository::class)]
class ValutazioneFiguraProfessionale
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $nome;

    #[ORM\Column(type: 'text')]
    private $operatore;

    #[ORM\Column(type: 'string')]
    private $tipoOperatore;

    #[ORM\Column(type: 'text')]
    private $diagnosiProfessionale;

    #[ORM\Column(type: 'text')]
    private $obbiettiviDaRaggiungere;

    #[ORM\Column(type: 'text')]
    private $tipoEFrequenza;

    #[ORM\Column(type: 'text')]
    private $modalitĂ TempiMonitoraggio;

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

    public function getOperatore(): ?string
    {
        return $this->operatore;
    }

    public function setOperatore(string $operatore): self
    {
        $this->operatore = $operatore;

        return $this;
    }
    
    public function getTipoOperatore(): ?string
    {
        return $this->tipoOperatore;
    }

    public function setTipoOperatore(string $tipoOperatore): self
    {
        $this->tipoOperatore = $tipoOperatore;
        
        return $this;
    }

    public function getDiagnosiProfessionale(): ?string
    {
        return $this->diagnosiProfessionale;
    }

    public function setDiagnosiProfessionale(string $diagnosiProfessionale): self
    {
        $this->diagnosiProfessionale = $diagnosiProfessionale;

        return $this;
    }

    public function getObbiettiviDaRaggiungere(): ?string
    {
        return $this->obbiettiviDaRaggiungere;
    }

    public function setObbiettiviDaRaggiungere(string $obbiettiviDaRaggiungere): self
    {
        $this->obbiettiviDaRaggiungere = $obbiettiviDaRaggiungere;

        return $this;
    }

    public function getTipoEFrequenza(): ?string
    {
        return $this->tipoEFrequenza;
    }

    public function setTipoEFrequenza(string $tipoEFrequenza): self
    {
        $this->tipoEFrequenza = $tipoEFrequenza;

        return $this;
    }

    public function getModalitĂ TempiMonitoraggio(): ?string
    {
        return $this->modalitĂ TempiMonitoraggio;
    }

    public function setModalitĂ TempiMonitoraggio(string $modalitĂ TempiMonitoraggio): self
    {
        $this->modalitĂ TempiMonitoraggio = $modalitĂ TempiMonitoraggio;

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
