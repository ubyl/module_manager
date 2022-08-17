<?php

namespace App\Entity\EntityPAI;

use Doctrine\Common\Collections\Collection;
use App\Repository\AltraTipologiaAssistenzaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AltraTipologiaAssistenzaRepository::class)]
#[ORM\Table(name: 'SCHEDA_PAI_altra_tipologia_assistenza')]

class AltraTipologiaAssistenza
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $nome;

    #[ORM\ManyToMany(mappedBy: 'altra_tipologia_assistenza', targetEntity: ValutazioneGenerale::class)]
    private $valutazioneGenerale;

    public function __toString()
    {
        return $this->nome;
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

     /**
     * @return Collection<int, ValutazioneGenerale>
     */
    public function getValutazioneGenerale(): Collection
    {
        return $this->valutazioneGenerale;
    }

    public function addValutazioneGenerale(ValutazioneGenerale $valutazioneGenerale): self
    {
        
        if (!$this->valutazioneGenerale->contains($valutazioneGenerale)) {
            $this->valutazioneGenerale[] = $valutazioneGenerale;
            
        }

        return $this;
    }

    public function removeValutazioneGenerale(ValutazioneGenerale $valutazioneGenerale): self
    {
        if ($this->valutazioneGenerale->removeElement($valutazioneGenerale)) {
            // set the owning side to null (unless already changed)
           
        }

        return $this;
    }

}
