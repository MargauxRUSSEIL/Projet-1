<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $mail;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adjoint;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $actif;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adjoint2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adjoint3;

    /**
     * @ORM\ManyToMany(targetEntity=Roles::class, inversedBy="users", cascade={"persist", "remove"})
     */
    private $roles;

    /**
     * @ORM\ManyToMany(targetEntity=Workflow::class, mappedBy="users", cascade={"persist", "remove"})
     */
    private $workflows;

    /**
     * @ORM\ManyToMany(targetEntity=Composante::class, mappedBy="users")
     */
    private $composantes;

    /**
     * @ORM\OneToMany(targetEntity=Formation::class, mappedBy="user")
     */
    private $formations;

    /**
     * @ORM\OneToMany(targetEntity=Parcours::class, mappedBy="user")
     */
    private $parcours;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
        //$this->workflows = new ArrayCollection();
        $this->composantes = new ArrayCollection();
        $this->formation = new ArrayCollection();
        $this->parcours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdjoint(): ?string
    {
        return $this->adjoint;
    }

    public function setAdjoint(?string $adjoint): self
    {
        $this->adjoint = $adjoint;

        return $this;
    }

    public function getActif(): ?int
    {
        return $this->actif;
    }

    public function setActif(?int $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getAdjoint2(): ?string
    {
        return $this->adjoint2;
    }

    public function setAdjoint2(?string $adjoint2): self
    {
        $this->adjoint2 = $adjoint2;

        return $this;
    }

    public function getAdjoint3(): ?string
    {
        return $this->adjoint3;
    }

    public function setAdjoint3(?string $adjoint3): self
    {
        $this->adjoint3 = $adjoint3;

        return $this;
    }

    /**
     * @return Collection|Roles[]
     */
    public function getRoles(): Collection
    {
        return $this->roles;
    }

    public function addRole(Roles $role): self
    {
        if (!$this->roles->contains($role)) {
            $this->roles[] = $role;
        }

        return $this;
    }

    public function removeRole(Roles $role): self
    {
        $this->roles->removeElement($role);

        return $this;
    }

    /**
     * @return Collection|Workflow[]
     */
    public function getWorkflows(): Collection
    {
        return $this->workflows;
    }

    public function addWorkflow(Workflow $workflow): self
    {
        if (!$this->workflows->contains($workflow)) {
            $this->workflows[] = $workflow;
            $workflow->addUser($this);
        }

        return $this;
    }

    public function removeWorkflow(Workflow $workflow): self
    {
        if ($this->workflows->removeElement($workflow)) {
            $workflow->removeUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|Composante[]
     */
    public function getComposantes(): Collection
    {
        return $this->composantes;
    }

    public function addComposante(Composante $composante): self
    {
        if (!$this->composantes->contains($composante)) {
            $this->composantes[] = $composante;
            $composante->addUser($this);
        }

        return $this;
    }

    public function removeComposante(Composante $composante): self
    {
        if ($this->composantes->removeElement($composante)) {
            $composante->removeUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->setUser($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formations->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getUser() === $this) {
                $formation->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Parcours[]
     */
    public function getParcours(): Collection
    {
        return $this->parcours;
    }

    public function addParcour(Parcours $parcour): self
    {
        if (!$this->parcours->contains($parcour)) {
            $this->parcours[] = $parcour;
            $parcour->setUser($this);
        }

        return $this;
    }

    public function removeParcour(Parcours $parcour): self
    {
        if ($this->parcours->removeElement($parcour)) {
            // set the owning side to null (unless already changed)
            if ($parcour->getUser() === $this) {
                $parcour->setUser(null);
            }
        }

        return $this;
    }
}
