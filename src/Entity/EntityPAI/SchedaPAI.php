<?php

namespace App\Entity\EntityPAI;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\SchedaPAIRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

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

    #[ORM\ManyToMany(inversedBy: 'infSchedaPai', targetEntity: User::class)]
    #[ORM\JoinTable(name: 'scheda_pai_user_inf')]
    #[ORM\JoinColumn(name: 'user_inf_id', referencedColumnName: 'id', nullable:true)]
    #[ORM\InverseJoinColumn(name: 'scheda_pai_inf_id', referencedColumnName: 'id')]
    private $idOperatoreSecondarioInf;

    #[ORM\ManyToMany(inversedBy: 'tdrSchedaPai', targetEntity: User::class)]
    #[ORM\JoinTable(name: 'scheda_pai_user_tdr')]
    #[ORM\JoinColumn(name: 'user_tdr_id', referencedColumnName: 'id', nullable:true)]
    #[ORM\InverseJoinColumn(name: 'scheda_pai_tdr_id', referencedColumnName: 'id')]
    private $idOperatoreSecondarioTdr;

    #[ORM\ManyToMany(inversedBy: 'logSchedaPai', targetEntity: User::class)]
    #[ORM\JoinTable(name: 'scheda_pai_user_log')]
    #[ORM\JoinColumn(name: 'user_log_id', referencedColumnName: 'id', nullable:true)]
    #[ORM\InverseJoinColumn(name: 'scheda_pai_log_id', referencedColumnName: 'id')]
    private $idOperatoreSecondarioLog;

    #[ORM\ManyToMany(inversedBy: 'asaSchedaPai', targetEntity: User::class)]
    #[ORM\JoinTable(name: 'scheda_pai_user_asa')]
    #[ORM\JoinColumn(name: 'user_asa_id', referencedColumnName: 'id', nullable:true)]
    #[ORM\InverseJoinColumn(name: 'scheda_pai_asa_id', referencedColumnName: 'id')]
    private $idOperatoreSecondarioAsa;

    #[ORM\ManyToMany(inversedBy: 'ossSchedaPai', targetEntity: User::class)]
    #[ORM\JoinTable(name: 'scheda_pai_user_oss')]
    #[ORM\JoinColumn(name: 'user_oss_id', referencedColumnName: 'id', nullable:true)]
    #[ORM\InverseJoinColumn(name: 'scheda_pai_oss_id', referencedColumnName: 'id')]
    private $idOperatoreSecondarioOss;

    #[ORM\Column(type: 'integer')]
    private $idAssistito;

    #[ORM\Column(type: 'integer')]
    private $idConsole;

    #[ORM\Column(type: 'integer')]
    private $idProgetto;

    #[ORM\OneToOne(targetEntity: ValutazioneGenerale::class, inversedBy: 'schedaPAI', cascade: ['persist', 'remove'])]
    private $idValutazioneGenerale;

    #[ORM\OneToMany(mappedBy: 'schedaPAI', targetEntity: ValutazioneFiguraProfessionale::class)]
    private $idValutazioneFiguraProfessionale;

    #[ORM\OneToOne(targetEntity: ParereMMG::class, inversedBy: 'schedaPAI', cascade: ['persist', 'remove'])]
    private $idParereMmg;

    #[ORM\OneToOne(targetEntity: ChiusuraServizio::class,inversedBy: 'schedaPAI', cascade: ['persist', 'remove'])]
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

    #[ORM\OneToMany(mappedBy: 'schedaPAI', targetEntity: Lesioni::class)]
    private Collection $idLesioni;

    #[ORM\Column(type: 'string')]
    private $currentPlace = 'nuova';


    public function __construct()
    {
        $this->idOperatoreSecondarioInf = new ArrayCollection();
        $this->idOperatoreSecondarioTdr = new ArrayCollection();
        $this->idOperatoreSecondarioLog = new ArrayCollection();
        $this->idOperatoreSecondarioAsa = new ArrayCollection();
        $this->idOperatoreSecondarioOss = new ArrayCollection();
        $this->idValutazioneFiguraProfessionale = new ArrayCollection();
        $this->idBarthel = new ArrayCollection();
        $this->idBraden = new ArrayCollection();
        $this->idSpmsq = new ArrayCollection();
        $this->idTinetti = new ArrayCollection();
        $this->idVas = new ArrayCollection();
        $this->idLesioni = new ArrayCollection();
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

    /**
     * @return Collection<int, User>
     */
    public function getidOperatoreSecondarioInf(): Collection
    {
        return $this->idOperatoreSecondarioInf;
    }

    public function addidOperatoreSecondarioInf(User $idOperatoreSecondarioInf): self
    {
        if (!$this->idOperatoreSecondarioInf->contains($idOperatoreSecondarioInf)) {
            $this->idOperatoreSecondarioInf[] = $idOperatoreSecondarioInf;
            
        }

        return $this;
    }

    public function removeidOperatoreSecondarioInf(User $idOperatoreSecondarioInf): self
    {
        if ($this->idOperatoreSecondarioInf->removeElement($idOperatoreSecondarioInf)) {
            // set the owning side to null (unless already changed)
           
        }

        return $this;
    }

     /**
     * @return Collection<int, User>
     */
    public function getidOperatoreSecondarioTdr(): Collection
    {
        return $this->idOperatoreSecondarioTdr;
    }

    public function addidOperatoreSecondarioTdr(User $idOperatoreSecondarioTdr): self
    {
        if (!$this->idOperatoreSecondarioTdr->contains($idOperatoreSecondarioTdr)) {
            $this->idOperatoreSecondarioTdr[] = $idOperatoreSecondarioTdr;
            
        }

        return $this;
    }

    public function removeidOperatoreSecondarioTdr(User $idOperatoreSecondarioTdr): self
    {
        if ($this->idOperatoreSecondarioTdr->removeElement($idOperatoreSecondarioTdr)) {
            // set the owning side to null (unless already changed)
           
        }

        return $this;
    }

     /**
     * @return Collection<int, User>
     */
    public function getidOperatoreSecondarioLog(): Collection
    {
        return $this->idOperatoreSecondarioLog;
    }

    public function addidOperatoreSecondarioLog(User $idOperatoreSecondarioLog): self
    {
        if (!$this->idOperatoreSecondarioLog->contains($idOperatoreSecondarioLog)) {
            $this->idOperatoreSecondarioLog[] = $idOperatoreSecondarioLog;
            
        }

        return $this;
    }

    public function removeidOperatoreSecondarioLog(User $idOperatoreSecondarioLog): self
    {
        if ($this->idOperatoreSecondarioLog->removeElement($idOperatoreSecondarioLog)) {
            // set the owning side to null (unless already changed)
           
        }

        return $this;
    }

     /**
     * @return Collection<int, User>
     */
    public function getidOperatoreSecondarioAsa(): Collection
    {
        return $this->idOperatoreSecondarioAsa;
    }

    public function addidOperatoreSecondarioAsa(User $idOperatoreSecondarioAsa): self
    {
        if (!$this->idOperatoreSecondarioAsa->contains($idOperatoreSecondarioAsa)) {
            $this->idOperatoreSecondarioAsa[] = $idOperatoreSecondarioAsa;
            
        }

        return $this;
    }

    public function removeidOperatoreSecondarioAsa(User $idOperatoreSecondarioAsa): self
    {
        if ($this->idOperatoreSecondarioAsa->removeElement($idOperatoreSecondarioAsa)) {
            // set the owning side to null (unless already changed)
           
        }

        return $this;
    }

     /**
     * @return Collection<int, User>
     */
    public function getidOperatoreSecondarioOss(): Collection
    {
        return $this->idOperatoreSecondarioOss;
    }

    public function addidOperatoreSecondarioOss(User $idOperatoreSecondarioOss): self
    {
        if (!$this->idOperatoreSecondarioOss->contains($idOperatoreSecondarioOss)) {
            $this->idOperatoreSecondarioOss[] = $idOperatoreSecondarioOss;
            
        }

        return $this;
    }

    public function removeidOperatoreSecondarioOss(User $idOperatoreSecondarioOss): self
    {
        if ($this->idOperatoreSecondarioOss->removeElement($idOperatoreSecondarioOss)) {
            // set the owning side to null (unless already changed)
           
        }

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
        return $this->idValutazioneGenerale;
    }

    public function setIdValutazioneGenerale(?ValutazioneGenerale $idValutazioneGenerale): self
    {
        $this->idValutazioneGenerale = $idValutazioneGenerale;

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

    public function addIdVas(Vas $idVas): self
    {
        if (!$this->idVas->contains($idVas)) {
            $this->idVas[] = $idVas;
            $idVas->setSchedaPAI($this);
        }

        return $this;
    }

    public function removeIdVas(Vas $idVas): self
    {
        if ($this->idVas->removeElement($idVas)) {
            // set the owning side to null (unless already changed)
            if ($idVas->getSchedaPAI() === $this) {
                $idVas->setSchedaPAI(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Lesioni>
     */
    public function getIdLesioni(): Collection
    {
        return $this->idLesioni;
    }

    public function addIdLesioni(Lesioni $idLesioni): self
    {
        if (!$this->idLesioni->contains($idLesioni)) {
            $this->idLesioni->add($idLesioni);
            $idLesioni->setSchedaPAI($this);
        }

        return $this;
    }

    public function removeIdLesioni(Lesioni $idLesioni): self
    {
        if ($this->idLesioni->removeElement($idLesioni)) {
            // set the owning side to null (unless already changed)
            if ($idLesioni->getSchedaPAI() === $this) {
                $idLesioni->setSchedaPAI(null);
            }
        }

        return $this;
    }

    public function getCurrentPlace()
    {
        return $this->currentPlace;
    }

    public function setCurrentPlace($currentPlace, $context = [])
    {
        $this->currentPlace = $currentPlace;
    }

}
