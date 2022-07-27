<?php

namespace App\Entity\EntityPAI;

use App\Repository\SchedaPAIRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SchedaPAIRepository::class)]
#[ORM\Table(name: 'SCHEDA_PAI')]

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

    #[ORM\OneToOne(targetEntity: ValutazioneGenerale::class, cascade: ['persist', 'remove'])]
    private $id_valutazione_generale;

    #[ORM\OneToMany(mappedBy: 'schedaPAI', targetEntity: ValutazioneFiguraProfessionale::class)]
    private $idValutazioneFiguraProfessionale;

    #[ORM\OneToOne(targetEntity: ParereMMG::class, cascade: ['persist', 'remove'])]
    private $idParereMmg;

    #[ORM\OneToOne(targetEntity: ChiusuraServizio::class, cascade: ['persist', 'remove'])]
    private $idChiusuraServizio;

    #[ORM\OneToMany(mappedBy: 'schedaPAI', targetEntity: Barthel::class)]
    private $idBarthel;

    #[ORM\OneToMany(mappedBy: 'schedaPAI', targetEntity: Braden::class)]
    private $idBraden;

    #[ORM\OneToMany(mappedBy: 'schedaPAI', targetEntity: SPMSQ::class)]
    private $idSpmsq;

    #[ORM\OneToMany(mappedBy: 'schedaPAI', targetEntity: Tinetti::class)]
    private $idTinetti;

    #[ORM\OneToMany(mappedBy: 'schedaPAI', targetEntity: Vas::class)]
    private $idVas;

    public function __construct()
    {
        $this->idValutazioneFiguraProfessionale = new ArrayCollection();
        $this->idBarthel = new ArrayCollection();
        $this->idBraden = new ArrayCollection();
        $this->idSpmsq = new ArrayCollection();
        $this->idTinetti = new ArrayCollection();
        $this->idVas = new ArrayCollection();
    }


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

    public function getIdValutazioneGenerale(): ?ValutazioneGenerale
    {
        return $this->id_valutazione_generale;
    }

    public function setIdValutazioneGenerale(?ValutazioneGenerale $id_valutazione_generale): self
    {
        $this->id_valutazione_generale = $id_valutazione_generale;

        return $this;
    }

    /**
     * @return Collection<int, ValutazioneFiguraProfessionale>
     */
    public function getIdValutazioneFiguraProfessionale(): Collection
    {
        return $this->idValutazioneFiguraProfessionale;
    }

    public function addIdValutazioneFiguraProfessionale(ValutazioneFiguraProfessionale $idValutazioneFiguraProfessionale): self
    {
        if (!$this->idValutazioneFiguraProfessionale->contains($idValutazioneFiguraProfessionale)) {
            $this->idValutazioneFiguraProfessionale[] = $idValutazioneFiguraProfessionale;
            $idValutazioneFiguraProfessionale->setSchedaPAI($this);
        }

        return $this;
    }

    public function removeIdValutazioneFiguraProfessionale(ValutazioneFiguraProfessionale $idValutazioneFiguraProfessionale): self
    {
        if ($this->idValutazioneFiguraProfessionale->removeElement($idValutazioneFiguraProfessionale)) {
            // set the owning side to null (unless already changed)
            if ($idValutazioneFiguraProfessionale->getSchedaPAI() === $this) {
                $idValutazioneFiguraProfessionale->setSchedaPAI(null);
            }
        }

        return $this;
    }

    public function getIdParereMmg(): ?ParereMMG
    {
        return $this->idParereMmg;
    }

    public function setIdParereMmg(?ParereMMG $idParereMmg): self
    {
        $this->idParereMmg = $idParereMmg;

        return $this;
    }

    public function getIdChiusuraServizio(): ?ChiusuraServizio
    {
        return $this->idChiusuraServizio;
    }

    public function setIdChiusuraServizio(?ChiusuraServizio $idChiusuraServizio): self
    {
        $this->idChiusuraServizio = $idChiusuraServizio;

        return $this;
    }

    /**
     * @return Collection<int, Barthel>
     */
    public function getIdBarthel(): Collection
    {
        return $this->idBarthel;
    }

    public function addIdBarthel(Barthel $idBarthel): self
    {
        if (!$this->idBarthel->contains($idBarthel)) {
            $this->idBarthel[] = $idBarthel;
            $idBarthel->setSchedaPAI($this);
        }

        return $this;
    }

    public function removeIdBarthel(Barthel $idBarthel): self
    {
        if ($this->idBarthel->removeElement($idBarthel)) {
            // set the owning side to null (unless already changed)
            if ($idBarthel->getSchedaPAI() === $this) {
                $idBarthel->setSchedaPAI(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Braden>
     */
    public function getIdBraden(): Collection
    {
        return $this->idBraden;
    }

    public function addIdBraden(Braden $idBraden): self
    {
        if (!$this->idBraden->contains($idBraden)) {
            $this->idBraden[] = $idBraden;
            $idBraden->setSchedaPAI($this);
        }

        return $this;
    }

    public function removeIdBraden(Braden $idBraden): self
    {
        if ($this->idBraden->removeElement($idBraden)) {
            // set the owning side to null (unless already changed)
            if ($idBraden->getSchedaPAI() === $this) {
                $idBraden->setSchedaPAI(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SPMSQ>
     */
    public function getIdSpmsq(): Collection
    {
        return $this->idSpmsq;
    }

    public function addIdSpmsq(SPMSQ $idSpmsq): self
    {
        if (!$this->idSpmsq->contains($idSpmsq)) {
            $this->idSpmsq[] = $idSpmsq;
            $idSpmsq->setSchedaPAI($this);
        }

        return $this;
    }

    public function removeIdSpmsq(SPMSQ $idSpmsq): self
    {
        if ($this->idSpmsq->removeElement($idSpmsq)) {
            // set the owning side to null (unless already changed)
            if ($idSpmsq->getSchedaPAI() === $this) {
                $idSpmsq->setSchedaPAI(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Tinetti>
     */
    public function getIdTinetti(): Collection
    {
        return $this->idTinetti;
    }

    public function addIdTinetti(Tinetti $idTinetti): self
    {
        if (!$this->idTinetti->contains($idTinetti)) {
            $this->idTinetti[] = $idTinetti;
            $idTinetti->setSchedaPAI($this);
        }

        return $this;
    }

    public function removeIdTinetti(Tinetti $idTinetti): self
    {
        if ($this->idTinetti->removeElement($idTinetti)) {
            // set the owning side to null (unless already changed)
            if ($idTinetti->getSchedaPAI() === $this) {
                $idTinetti->setSchedaPAI(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Vas>
     */
    public function getIdVas(): Collection
    {
        return $this->idVas;
    }

    public function addIdVa(Vas $idVa): self
    {
        if (!$this->idVas->contains($idVa)) {
            $this->idVas[] = $idVa;
            $idVa->setSchedaPAI($this);
        }

        return $this;
    }

    public function removeIdVa(Vas $idVa): self
    {
        if ($this->idVas->removeElement($idVa)) {
            // set the owning side to null (unless already changed)
            if ($idVa->getSchedaPAI() === $this) {
                $idVa->setSchedaPAI(null);
            }
        }

        return $this;
    }

}
