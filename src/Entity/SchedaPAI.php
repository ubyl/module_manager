<?php

namespace App\Entity;

use App\Repository\SchedaPAIRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SchedaPAIRepository::class)]
class SchedaPAI
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $idOperatorePrincipale;

    #[ORM\Column(type: 'array', nullable: true)]
    private $idOperatoreSecondarioInf = [];

    #[ORM\Column(type: 'array', nullable: true)]
    private $idOperatoreSecondarioTdr = [];

    #[ORM\Column(type: 'array', nullable: true)]
    private $idOperatoreSecondarioLog = [];

    #[ORM\Column(type: 'array', nullable: true)]
    private $idOperatoreSecondarioAsa = [];

    #[ORM\Column(type: 'array', nullable: true)]
    private $idOperatoreSecondarioOss = [];

    #[ORM\Column(type: 'integer')]
    private $idAssistito;

    #[ORM\Column(type: 'integer')]
    private $idConsole;

    #[ORM\Column(type: 'integer')]
    private $idProgetto;

    #[ORM\Column(type: 'integer')]
    private $idValutazioneGenerale;

    #[ORM\Column(type: 'array')]
    private $idValutazioneFiguraProfessionale = [];

    #[ORM\Column(type: 'integer')]
    private $idParereMmg;

    #[ORM\Column(type: 'integer')]
    private $idChiusuraServizio;

    #[ORM\Column(type: 'array')]
    private $idBarthel = [];

    #[ORM\Column(type: 'array')]
    private $idBraden = [];

    #[ORM\Column(type: 'array')]
    private $idSpmsq = [];

    #[ORM\Column(type: 'array')]
    private $idTinetti = [];

    #[ORM\Column(type: 'array')]
    private $idVas = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdOperatorePrincipale(): ?int
    {
        return $this->idOperatorePrincipale;
    }

    public function setIdOperatorePrincipale(int $idOperatorePrincipale): self
    {
        $this->idOperatorePrincipale = $idOperatorePrincipale;

        return $this;
    }

    public function getIdOperatoreSecondarioInf(): ?array
    {
        return $this->idOperatoreSecondarioInf;
    }

    public function setIdOperatoreSecondarioInf(?array $idOperatoreSecondarioInf): self
    {
        $this->idOperatoreSecondarioInf = $idOperatoreSecondarioInf;

        return $this;
    }

    public function getIdOperatoreSecondarioTdr(): ?array
    {
        return $this->idOperatoreSecondarioTdr;
    }

    public function setIdOperatoreSecondarioTdr(?array $idOperatoreSecondarioTdr): self
    {
        $this->idOperatoreSecondarioTdr = $idOperatoreSecondarioTdr;

        return $this;
    }

    public function getIdOperatoreSecondarioLog(): ?array
    {
        return $this->idOperatoreSecondarioLog;
    }

    public function setIdOperatoreSecondarioLog(?array $idOperatoreSecondarioLog): self
    {
        $this->idOperatoreSecondarioLog = $idOperatoreSecondarioLog;

        return $this;
    }

    public function getIdOperatoreSecondarioAsa(): ?array
    {
        return $this->idOperatoreSecondarioAsa;
    }

    public function setIdOperatoreSecondarioAsa(?array $idOperatoreSecondarioAsa): self
    {
        $this->idOperatoreSecondarioAsa = $idOperatoreSecondarioAsa;

        return $this;
    }

    public function getIdOperatoreSecondarioOss(): ?array
    {
        return $this->idOperatoreSecondarioOss;
    }

    public function setIdOperatoreSecondarioOss(?array $idOperatoreSecondarioOss): self
    {
        $this->idOperatoreSecondarioOss = $idOperatoreSecondarioOss;

        return $this;
    }

    public function getIdAssistito(): ?int
    {
        return $this-> idAssistito;
    }

    public function setIdAssistito(?int $idAssistito): self
    {
        $this->idAssistito = $idAssistito;

        return $this;
    }

    public function getIdConsole(): ?int
    {
        return $this-> idConsole;
    }

    public function setIdConsole(?int $idConsole): self
    {
        $this-> idConsole = $idConsole;

        return $this;
    }

    public function getIdProgetto(): ?int
    {
        return $this-> idProgetto;
    }

    public function setIdProgetto(?int $idProgetto): self
    {
        $this->idProgetto = $idProgetto;

        return $this;
    }

    public function getIdValutazioneGenerale(): ?int
    {
        return $this-> IdValutazioneGenerale;
    }

    public function setIdValutazioneGVerale(?int $IdValutazioneGenerale): self
    {
        $this->IdValutazioneGenerale = $IdValutazioneGenerale;
        return $this;
    }

    public function getIdValutazioneFiguraProfessionale(): ?array
    {
        return $this-> IdValutazioneFiguraProfessionale;
    }

    public function setIdValutazioneFiguraProfessionale(?array $IdValutazioneFiguraProfessionale): self 
    {
        $this->IdValutazioneFiguraProfessionale = $IdValutazineFiguraProfessionale;
        return $this;
    }

    public function getIdParereMmg(): ?int
    {
        return $this->IdParereMmg;
    }

    public function setIdParereMmg(?int $idParereMmg): self
    {
        $this->idParereMmg = $idParereMmg;
        return $this;
    }

    public function getIdChiusuraServizio(): ?int
    {
        return $this->idChiusuraServizio;
    }

    public function setIdChiusuraServizio(?int $idChiusuraServizio): self
    {
        $this->idChiusuraServizio = $idChiusuraServizio;
        return $this;
    }

    public function getIdBarthel(): ?array
    {
        return $this->idBarthel;
    }

    public function setIdBarthel(?array $idBarthel): self
    {
        $this->idBarthel = $idBarthel;

        return $this;
    }

    public function getIdBraden(): ?array
    {
        return $this->idBraden;
    }

    public function setIdBraden(?array $idBraden): self
    {
        $this->idBraden = $idBraden;

        return $this;
    }

    public function getIdSpmsq(): ?array
    {
        return $this->idSpmsq;
    }

    public function setIdSpmsq(?array $idSpmsq): self
    {
        $this->idSpmsq = $idSpmsq;

        return $this;
    }

    public function getIdTinetti(): ?array
    {
        return $this->idTinetti;
    }

    public function setIdTinetti(?array $idTinetti): self
    {
        $this->idTinetti = $idTinetti;

        return $this;
    }

    public function getIdVas(): ?array
    {
        return $this->idVas;
    }

    public function setIdVas(?array $idVas): self
    {
        $this->idVas = $idVas;

        return $this;
    }
}
