<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use App\Entity\EntityPAI\SchedaPAI;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'user')]

class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180)]
    private $email;

    #[ORM\Column(type: 'string', length: 180, nullable: true)]
    private $username = null;

    #[ORM\Column(type: 'string')]
    private $name;

    #[ORM\Column(type: 'string')]
    private $surname;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\OneToMany(mappedBy: 'idOperatorePrincipale', targetEntity: SchedaPAI::class)]
    private $principaleSchedaPai;

    #[ORM\ManyToMany(mappedBy: 'idOperatoreSecondarioInf', targetEntity: SchedaPai::class)]
    private $infSchedaPai;

    #[ORM\ManyToMany(mappedBy: 'idOperatoreSecondarioTdr', targetEntity: SchedaPai::class)]
    private $tdrSchedaPai;

    #[ORM\ManyToMany(mappedBy: 'idOperatoreSecondarioLog', targetEntity: SchedaPai::class)]
    private $logSchedaPai;

    #[ORM\ManyToMany(mappedBy: 'idOperatoreSecondarioAsa', targetEntity: SchedaPai::class)]
    private $asaSchedaPai;
   
    #[ORM\ManyToMany(mappedBy: 'idOperatoreSecondarioOss', targetEntity: SchedaPai::class)]
    private $ossSchedaPai;

    #[ORM\Column(type: 'boolean')]
    private $sdManagerOperatore = false;
    

    public function __construct()
    {
        $this->principaleSchedaPai = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;
        
        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        //$roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

     /**
     * @return Collection<int, SchedaPai>
     */
    public function getInfSchedaPai()
    {
        return $this->infSchedaPai;
    }

    public function addinfSchedaPai(SchedaPAI $infSchedaPai): self
    {
        if (!$this->infSchedaPai->contains($infSchedaPai)) {
            $this->infSchedaPai[] = $infSchedaPai;
            
        }

        return $this;
    }

    public function removeinfSchedaPai(SchedaPai $infSchedaPai): self
    {
        if ($this->infSchedaPai->removeElement($infSchedaPai)) {
            // set the owning side to null (unless already changed)
           
        }

        return $this;
    }

         /**
     * @return Collection<int, SchedaPai>
     */
    public function getTdrSchedaPai()
    {
        return $this->tdrSchedaPai;
    }

    public function addtdrSchedaPai(SchedaPAI $tdrSchedaPai): self
    {
        if (!$this->tdrSchedaPai->contains($tdrSchedaPai)) {
            $this->tdrSchedaPai[] = $tdrSchedaPai;
            
        }

        return $this;
    }

    public function removetdrSchedaPai(SchedaPai $tdrSchedaPai): self
    {
        if ($this->tdrSchedaPai->removeElement($tdrSchedaPai)) {
            // set the owning side to null (unless already changed)
           
        }

        return $this;
    }

         /**
     * @return Collection<int, SchedaPai>
     */
    public function getLogSchedaPai()
    {
        return $this->logSchedaPai;
    }

    public function addlogSchedaPai(SchedaPAI $logSchedaPai): self
    {
        if (!$this->logSchedaPai->contains($logSchedaPai)) {
            $this->logSchedaPai[] = $logSchedaPai;
            
        }

        return $this;
    }

    public function removelogSchedaPai(SchedaPai $logSchedaPai): self
    {
        if ($this->logSchedaPai->removeElement($logSchedaPai)) {
            // set the owning side to null (unless already changed)
           
        }

        return $this;
    }

         /**
     * @return Collection<int, SchedaPai>
     */
    public function getAsaSchedaPai()
    {
        return $this->asaSchedaPai;
    }

    public function addasaSchedaPai(SchedaPAI $asaSchedaPai): self
    {
        if (!$this->asaSchedaPai->contains($asaSchedaPai)) {
            $this->asaSchedaPai[] = $asaSchedaPai;
            
        }

        return $this;
    }

    public function removeasaSchedaPai(SchedaPai $asaSchedaPai): self
    {
        if ($this->asaSchedaPai->removeElement($asaSchedaPai)) {
            // set the owning side to null (unless already changed)
           
        }

        return $this;
    }

         /**
     * @return Collection<int, SchedaPai>
     */
    public function getOssSchedaPai()
    {
        return $this->ossSchedaPai;
    }

    public function addossSchedaPai(SchedaPAI $ossSchedaPai): self
    {
        if (!$this->ossSchedaPai->contains($ossSchedaPai)) {
            $this->ossSchedaPai[] = $ossSchedaPai;
            
        }

        return $this;
    }

    public function removeossSchedaPai(SchedaPai $ossSchedaPai): self
    {
        if ($this->ossSchedaPai->removeElement($ossSchedaPai)) {
            // set the owning side to null (unless already changed)
           
        }

        return $this;
    }

    /**
     * @return Collection<int, SchedaPai>
     */
    public function getPrincipaleSchedaPai()
    {
        return $this->principaleSchedaPai;
    }

    public function addPrincipaleSchedaPai(SchedaPAI $principaleSchedaPai): self
    {
        if (!$this->principaleSchedaPai->contains($principaleSchedaPai)) {
            $this->principaleSchedaPai[] = $principaleSchedaPai;
            $principaleSchedaPai->setIdOperatorePrincipale($this);
        }

        return $this;
    }

    public function removePrincipaleSchedaPai(SchedaPAI $principaleSchedaPai): self
    {
        if ($this->principaleSchedaPai->removeElement($principaleSchedaPai)) {
            // set the owning side to null (unless already changed)
            if ($principaleSchedaPai->getIdOperatorePrincipale() === $this) {
                $principaleSchedaPai->setIdOperatorePrincipale(null);
            }
        }

        return $this;
    }

    public function isSdManagerOperatore():bool
    {
        return $this->sdManagerOperatore;
    }

    public function setSdManagerOperatore(bool $sdManagerOperatore): self
    {
        
        $this->sdManagerOperatore = $sdManagerOperatore;

        return $this;
    }

}
