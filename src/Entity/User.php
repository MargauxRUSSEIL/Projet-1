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
     * @ORM\OneToMany(targetEntity=RolesUser::class, mappedBy="user")
     */
    private $userRoles;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
        $this->userRoles = new ArrayCollection();
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
     * @return Collection|RolesUser[]
     */
    public function getUserRoles(): Collection
    {
        return $this->userRoles;
    }

    public function addUserRole(RolesUser $userRole): self
    {
        if (!$this->userRoles->contains($userRole)) {
            $this->userRoles[] = $userRole;
            $userRole->setUser($this);
        }

        return $this;
    }

    public function removeUserRole(RolesUser $userRole): self
    {
        if ($this->userRoles->removeElement($userRole)) {
            // set the owning side to null (unless already changed)
            if ($userRole->getUser() === $this) {
                $userRole->setUser(null);
            }
        }

        return $this;
    }
}
