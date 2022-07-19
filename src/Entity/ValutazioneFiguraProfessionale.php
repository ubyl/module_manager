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

    #[ORM\Column(type: 'TipoOperatore')]
    private $tipo_operatore;

    #[ORM\Column(type: 'text')]
    private $diagnosi_professionale;

    #[ORM\Column(type: 'text')]
    private $obbiettivi_da_raggiungere;

    #[ORM\Column(type: 'text')]
    private $tipo_e_frequenza;

    #[ORM\Column(type: 'text')]
    private $modalità_tempi_monitoraggio;

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

    public function getOperatore(): ?string
    {
        return $this->operatore;
    }

    public function setOperatore(string $operatore): self
    {
        $this->operatore = $operatore;

        return $this;
    }
    
    public function getTipoOperatore(): ?TipoOperatore
    {
        return $this->tipo_operatore;
    }

    public function setTipoOperatore(TipoOperatore $tipo_operatore): self
    {
        $this->tipo_operatore = $tipo_operatore;
        
        return $this;
    }

    public function getDiagnosiProfessionale(): ?string
    {
        return $this->diagnosi_professionale;
    }

    public function setDiagnosiProfessionale(string $diagnosi_professionale): self
    {
        $this->diagnosi_professionale = $diagnosi_professionale;

        return $this;
    }

    public function getObbiettiviDaRaggiungere(): ?string
    {
        return $this->obbiettivi_da_raggiungere;
    }

    public function setObbiettiviDaRaggiungere(string $obbiettivi_da_raggiungere): self
    {
        $this->obbiettivi_da_raggiungere = $obbiettivi_da_raggiungere;

        return $this;
    }

    public function getTipoEFrequenza(): ?string
    {
        return $this->tipo_e_frequenza;
    }

    public function setTipoEFrequenza(string $tipo_e_frequenza): self
    {
        $this->tipo_e_frequenza = $tipo_e_frequenza;

        return $this;
    }

    public function getModalitàTempiMonitoraggio(): ?string
    {
        return $this->modalità_tempi_monitoraggio;
    }

    public function setModalitàTempiMonitoraggio(string $modalità_tempi_monitoraggio): self
    {
        $this->modalità_tempi_monitoraggio = $modalità_tempi_monitoraggio;

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
