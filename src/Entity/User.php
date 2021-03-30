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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adjoint;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $actif;

    /**
     * @ORM\ManyToOne(targetEntity=Workflow::class, inversedBy="users")
     */
    private $workflow;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adjoint2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adjoint3;

    /**
     * @ORM\OneToMany(targetEntity=rolesUser::class, mappedBy="user")
     */
    private $roles;

    /**
     * @ORM\ManyToOne(targetEntity=Roles::class, inversedBy="users")
     */
    private $role;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
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

    public function getWorkflow(): ?Workflow
    {
        return $this->workflow;
    }

    public function setWorkflow(?Workflow $workflow): self
    {
        $this->workflow = $workflow;

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
     * @return Collection|rolesUser[]
     */
    public function getRoles(): Collection
    {
        return $this->roles;
    }

    public function addRole(rolesUser $role): self
    {
        if (!$this->roles->contains($role)) {
            $this->roles[] = $role;
            $role->setUser($this);
        }

        return $this;
    }

    public function removeRole(rolesUser $role): self
    {
        if ($this->roles->removeElement($role)) {
            // set the owning side to null (unless already changed)
            if ($role->getUser() === $this) {
                $role->setUser(null);
            }
        }

        return $this;
    }

    public function getRole(): ?Roles
    {
        return $this->role;
    }

    public function setRole(?Roles $role): self
    {
        $this->role = $role;

        return $this;
    }
}
