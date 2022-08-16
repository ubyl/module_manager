<?php

namespace App\Entity\EntityPAI;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\ValutazioneGeneraleRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ValutazioneGeneraleRepository::class)]
#[ORM\Table(name: 'SCHEDA_PAI_valutazione_generale')]
class ValutazioneGenerale
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string')]
    #[Assert\NotBlank]
    private $nome;

    #[ORM\Column(type: 'date')]
    #[Assert\NotBlank]
    #[Assert\Type(\DateTime::class)]
    private $data_valutazione;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank]
    private $n_componenti_nucleo_abitativo;

    #[ORM\Column(type: 'boolean')]
    private $rischio_infettivo;

    #[ORM\Column(type: 'string')]
    private $diagnosi;

    #[ORM\Column(type:"Valutazione", nullable:false)]
    #[Assert\NotBlank]
    private $tipologia_valutazione;

    #[ORM\Column(type: 'PANF', nullable:false)]
    #[Assert\NotBlank]
    private $panf;

    #[ORM\Column(type: 'FANF', nullable:false)]
    #[Assert\NotBlank]
    private $fanf;

    #[ORM\Column(type: 'ISS', nullable:false)]
    #[Assert\NotBlank]
    private $iss;

    #[ORM\Column(type: 'Autonomia', nullable:false)]
    #[Assert\NotBlank]
    private $uso_servizi_igenici;

    #[ORM\Column(type: 'Autonomia', nullable:false)]
    #[Assert\NotBlank]
    private $abbigliamento;

    #[ORM\Column(type: 'Autonomia', nullable:false)]
    #[Assert\NotBlank]
    private $alimentazione;

    #[ORM\Column(type: 'Autonomia', nullable:false)]
    #[Assert\NotBlank]
    private $indicatore_deambulazione;

    #[ORM\Column(type: 'Autonomia', nullable:false)]
    #[Assert\NotBlank]
    private $igene_personale;

    #[ORM\Column(type: 'Disturbi', nullable:false)]
    #[Assert\NotBlank]
    private $cognitivita;

    #[ORM\Column(type: 'Disturbi', nullable:false)]
    #[Assert\NotBlank]
    private $comportamento;

    #[ORM\ManyToMany(mappedBy: 'valutazioneGenerale', targetEntity: AltraTipologiaAssistenza::class)]
    private Collection $altra_tipologia_assistenza;

    #[ORM\ManyToMany(mappedBy: 'valutazioneGenerale', targetEntity: Bisogni::class)]
    private Collection $bisogni;

    public function __construct()
    {
        $this->altra_tipologia_assistenza = new ArrayCollection();
        $this->bisogni = new ArrayCollection();
    }

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

    public function getDataValutazione(): ?\DateTimeInterface
    {
        return $this->data_valutazione;
    }

    public function setDataValutazione(\DateTimeInterface $data_valutazione): self
    {
        $this->data_valutazione = $data_valutazione;

        return $this;
    }

    public function getNComponentiNucleoAbitativo(): ?int
    {
        return $this->n_componenti_nucleo_abitativo;
    }

    public function setNComponentiNucleoAbitativo(int $n_componenti_nucleo_abitativo): self
    {
        $this->n_componenti_nucleo_abitativo = $n_componenti_nucleo_abitativo;

        return $this;
    }

    public function isRischioInfettivo(): ?bool
    {
        return $this->rischio_infettivo;
    }

    public function setRischioInfettivo(bool $rischio_infettivo): self
    {
        $this->rischio_infettivo = $rischio_infettivo;

        return $this;
    }

    public function getDiagnosi(): ?string
    {
        return $this->diagnosi;
    }

    public function setDiagnosi(string $diagnosi): self
    {
        $this->diagnosi = $diagnosi;

        return $this;
    }

    public function getTipologiaValutazione(): ?string
    {
        return $this->tipologia_valutazione;
    }

    public function setTipologiaValutazione(string $tipologia_valutazione): self
    {
        $this->tipologia_valutazione = $tipologia_valutazione;

        return $this;
    }

    public function getPanf(): ?string
    {
        return $this->panf;
    }

    public function setPanf(string $panf): self
    {
        $this->panf = $panf;

        return $this;
    }

    public function getFanf(): ?string
    {
        return $this->fanf;
    }

    public function setFanf(string $fanf): self
    {
        $this->fanf = $fanf;

        return $this;
    }

    public function getIss(): ?string
    {
        return $this->iss;
    }

    public function setIss(string $iss): self
    {
        $this->iss = $iss;

        return $this;
    }

    public function getUsoServiziIgenici(): ?string
    {
        return $this->uso_servizi_igenici;
    }

    public function setUsoServiziIgenici(string $uso_servizi_igenici): self
    {
        $this->uso_servizi_igenici = $uso_servizi_igenici;

        return $this;
    }

    public function getAbbigliamento(): ?string
    {
        return $this->abbigliamento;
    }

    public function setAbbigliamento(string $abbigliamento): self
    {
        $this->abbigliamento = $abbigliamento;

        return $this;
    }

    public function getAlimentazione(): ?string
    {
        return $this->alimentazione;
    }

    public function setAlimentazione(string $alimentazione): self
    {
        $this->alimentazione = $alimentazione;

        return $this;
    }

    public function getIndicatoreDeambulazione(): ?string
    {
        return $this->indicatore_deambulazione;
    }

    public function setIndicatoreDeambulazione(string $indicatore_deambulazione): self
    {
        $this->indicatore_deambulazione = $indicatore_deambulazione;

        return $this;
    }

    public function getIgenePersonale(): ?string
    {
        return $this->igene_personale;
    }

    public function setIgenePersonale(string $igene_personale): self
    {
        $this->igene_personale = $igene_personale;

        return $this;
    }

    public function getCognitivita(): ?string
    {
        return $this->cognitivita;
    }

    public function setCognitivita(string $cognitivita): self
    {
        $this->cognitivita = $cognitivita;

        return $this;
    }

    public function getComportamento(): ?string
    {
        return $this->comportamento;
    }

    public function setComportamento(string $comportamento): self
    {
        $this->comportamento = $comportamento;

        return $this;
    }

    /**
     * @return Collection<int, AltraTipologiaAssistenza>
     */
    public function getAltraTipologiaAssistenza(): Collection
    {
        return $this->altra_tipologia_assistenza;
    }

    public function addAltraTipologiaAssistenza(AltraTipologiaAssistenza $altraTipologiaAssistenza): self
    {
        if (!$this->altra_tipologia_assistenza->contains($altraTipologiaAssistenza)) {
            $this->altra_tipologia_assistenza[] = $altraTipologiaAssistenza;
            
        }

        return $this;
    }

    public function removeAltraTipologiaAssistenza(AltraTipologiaAssistenza $altraTipologiaAssistenza): self
    {
        if ($this->altra_tipologia_assistenza->removeElement($altraTipologiaAssistenza)) {
            // set the owning side to null (unless already changed)
           
        }

        return $this;
    }

    /**
     * @return Collection<int, Bisogni>
     */
    public function getBisogni(): Collection
    {
        return $this->bisogni;
    }

    public function addBisogni(Bisogni $bisogni): self
    {
        if (!$this->bisogni->contains($bisogni)) {
            $this->bisogni[] = $bisogni;
            
        }

        return $this;
    }

    public function removeBisogni(Bisogni $bisogni): self
    {
        if ($this->bisogni->removeElement($bisogni)) {
            // set the owning side to null (unless already changed)
           
        }

        return $this;
    }
}
