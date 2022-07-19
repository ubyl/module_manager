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
    private $id_operatore_principale;

    #[ORM\Column(type: 'array', nullable: true)]
    private $id_operatore_secondario_inf = [];

    #[ORM\Column(type: 'array', nullable: true)]
    private $id_operatore_secondario_tdr = [];

    #[ORM\Column(type: 'array', nullable: true)]
    private $id_operatore_secondario_log = [];

    #[ORM\Column(type: 'array', nullable: true)]
    private $id_operatore_secondario_asa = [];

    #[ORM\Column(type: 'array', nullable: true)]
    private $id_operatore_secondario_oss = [];

    #[ORM\Column(type: 'integer')]
    private $id_assistito;

    #[ORM\Column(type: 'integer')]
    private $id_console;

    #[ORM\Column(type: 'integer')]
    private $id_progetto;

    #[ORM\Column(type: 'integer')]
    private $id_valutazione_generale;

    #[ORM\Column(type: 'array')]
    private $id_valutazione_figura_professionale = [];

    #[ORM\Column(type: 'integer')]
    private $id_parere_mmg;

    #[ORM\Column(type: 'integer')]
    private $id_chiusura_servizio;

    #[ORM\Column(type: 'array')]
    private $id_barthel = [];

    #[ORM\Column(type: 'array')]
    private $id_braden = [];

    #[ORM\Column(type: 'array')]
    private $id_spmsq = [];

    #[ORM\Column(type: 'array')]
    private $id_tinetti = [];

    #[ORM\Column(type: 'array')]
    private $id_vas = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdOperatorePrincipale(): ?int
    {
        return $this->id_operatore_principale;
    }

    public function setIdOperatorePrincipale(int $id_operatore_principale): self
    {
        $this->id_operatore_principale = $id_operatore_principale;

        return $this;
    }

    public function getIdOperatoreSecondarioInf(): ?array
    {
        return $this->id_operatore_secondario_inf;
    }

    public function setIdOperatoreSecondarioInf(?array $id_operatore_secondario_inf): self
    {
        $this->id_operatore_secondario_inf = $id_operatore_secondario_inf;

        return $this;
    }

    public function getIdOperatoreSecondarioTdr(): ?array
    {
        return $this->id_operatore_secondario_tdr;
    }

    public function setIdOperatoreSecondarioTdr(?array $id_operatore_secondario_tdr): self
    {
        $this->id_operatore_secondario_tdr = $id_operatore_secondario_tdr;

        return $this;
    }

    public function getIdOperatoreSecondarioLog(): ?array
    {
        return $this->id_operatore_secondario_log;
    }

    public function setIdOperatoreSecondarioLog(?array $id_operatore_secondario_log): self
    {
        $this->id_operatore_secondario_log = $id_operatore_secondario_log;

        return $this;
    }

    public function getIdOperatoreSecondarioAsa(): ?array
    {
        return $this->id_operatore_secondario_asa;
    }

    public function setIdOperatoreSecondarioAsa(?array $id_operatore_secondario_asa): self
    {
        $this->id_operatore_secondario_asa = $id_operatore_secondario_asa;

        return $this;
    }

    public function getIdOperatoreSecondarioOss(): ?array
    {
        return $this->id_operatore_secondario_oss;
    }

    public function setIdOperatoreSecondarioOss(?array $id_operatore_secondario_oss): self
    {
        $this->id_operatore_secondario_oss = $id_operatore_secondario_oss;

        return $this;
    }

    public function getIdAssistito(): ?int
    {
        return $this->id_assistito;
    }

    public function setIdAssistito(int $id_assistito): self
    {
        $this->id_assistito = $id_assistito;

        return $this;
    }

    public function getIdConsole(): ?int
    {
        return $this->id_console;
    }

    public function setIdConsole(int $id_console): self
    {
        $this->id_console = $id_console;

        return $this;
    }

    public function getIdProgetto(): ?int
    {
        return $this->id_progetto;
    }

    public function setIdProgetto(int $id_progetto): self
    {
        $this->id_progetto = $id_progetto;

        return $this;
    }

    public function getIdValutazioneGenerale(): ?int
    {
        return $this->id_valutazione_generale;
    }

    public function setIdValutazioneGenerale(int $id_valutazione_generale): self
    {
        $this->id_valutazione_generale = $id_valutazione_generale;

        return $this;
    }

    public function getIdValutazioneFiguraProfessionale(): ?array
    {
        return $this->id_valutazione_figura_professionale;
    }

    public function setIdValutazioneFiguraProfessionale(array $id_valutazione_figura_professionale): self
    {
        $this->id_valutazione_figura_professionale = $id_valutazione_figura_professionale;

        return $this;
    }

    public function getIdParereMmg(): ?int
    {
        return $this->id_parere_mmg;
    }

    public function setIdParereMmg(int $id_parere_mmg): self
    {
        $this->id_parere_mmg = $id_parere_mmg;

        return $this;
    }

    public function getIdChiusuraServizio(): ?int
    {
        return $this->id_chiusura_servizio;
    }

    public function setIdChiusuraServizio(int $id_chiusura_servizio): self
    {
        $this->id_chiusura_servizio = $id_chiusura_servizio;

        return $this;
    }

    public function getIdBarthel(): ?array
    {
        return $this->id_barthel;
    }

    public function setIdBarthel(array $id_barthel): self
    {
        $this->id_barthel = $id_barthel;

        return $this;
    }

    public function getIdBraden(): ?array
    {
        return $this->id_braden;
    }

    public function setIdBraden(array $id_braden): self
    {
        $this->id_braden = $id_braden;

        return $this;
    }

    public function getIdSpmsq(): ?array
    {
        return $this->id_spmsq;
    }

    public function setIdSpmsq(array $id_spmsq): self
    {
        $this->id_spmsq = $id_spmsq;

        return $this;
    }

    public function getIdTinetti(): ?array
    {
        return $this->id_tinetti;
    }

    public function setIdTinetti(array $id_tinetti): self
    {
        $this->id_tinetti = $id_tinetti;

        return $this;
    }

    public function getIdVas(): ?array
    {
        return $this->id_vas;
    }

    public function setIdVas(array $id_vas): self
    {
        $this->id_vas = $id_vas;

        return $this;
    }
}
