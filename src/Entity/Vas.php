<?php

namespace App\Entity;

use App\Repository\VasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VasRepository::class)]
class Vas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $paziente;

    #[ORM\Column(type: 'date')]
    private $data;

    #[ORM\Column(type: 'time')]
    private $ora;

    #[ORM\Column(type: 'string', length: 255)]
    private $base2;

    #[ORM\Column(type: 'string', length: 255)]
    private $pz;

    #[ORM\Column(type: 'string', length: 255)]
    private $esito;

    #[ORM\Column(type: 'integer')]
    private $rilevanzaMonitoraggio;

    #[ORM\Column(type: 'text')]
    private $firmaSanitario;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $trattamento;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaziente(): ?string
    {
        return $this->paziente;
    }

    public function setPaziente(string $paziente): self
    {
        $this->paziente = $paziente;

        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getOra(): ?\DateTimeInterface
    {
        return $this->ora;
    }

    public function setOra(\DateTimeInterface $ora): self
    {
        $this->ora = $ora;

        return $this;
    }

    public function getBase2(): ?string
    {
        return $this->base2;
    }

    public function setBase2(string $base2): self
    {
        $this->base2 = $base2;

        return $this;
    }

    public function getPz(): ?string
    {
        return $this->pz;
    }

    public function setPz(string $pz): self
    {
        $this->pz = $pz;

        return $this;
    }

    public function getEsito(): ?string
    {
        return $this->esito;
    }

    public function setEsito(string $esito): self
    {
        $this->esito = $esito;

        return $this;
    }

    public function getRilevanzaMonitoraggio(): ?int
    {
        return $this->rilevanzaMonitoraggio;
    }

    public function setRilevanzaMonitoraggio(int $rilevanzaMonitoraggio): self
    {
        $this->rilevanzaMonitoraggio = $rilevanzaMonitoraggio;

        return $this;
    }

    public function getFirmaSanitario(): ?string
    {
        return $this->firmaSanitario;
    }

    public function setFirmaSanitario(string $firmaSanitario): self
    {
        $this->firmaSanitario = $firmaSanitario;

        return $this;
    }

    public function isTrattamento(): ?bool
    {
        return $this->trattamento;
    }

    public function setTrattamento(?bool $trattamento): self
    {
        $this->trattamento = $trattamento;

        return $this;
    }
}
