<?php

namespace App\Entity;

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

    #[ORM\ManyToOne(targetEntity: ValutazioneGenerale::class, inversedBy: 'altra_tipologia_assistenza')]
    private $valutazioneGenerale;

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

    public function getValutazioneGenerale(): ?ValutazioneGenerale
    {
        return $this->valutazioneGenerale;
    }

    public function setValutazioneGenerale(?ValutazioneGenerale $valutazioneGenerale): self
    {
        $this->valutazioneGenerale = $valutazioneGenerale;

        return $this;
    }
}
