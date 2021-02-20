<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\WorkflowRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=WorkflowRepository::class)
 */
class Workflow
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $etapes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rolesWorkflow;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $actions;

    /**
     * @ORM\OneToMany(targetEntity=Formation::class, mappedBy="workflow")
     */
    private $formation;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="workflow")
     */
    private $users;

    public function __construct()
    {
        $this->formation = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtapes(): ?int
    {
        return $this->etapes;
    }

    public function setEtapes(?int $etapes): self
    {
        $this->etapes = $etapes;

        return $this;
    }

    public function getRolesWorkflow(): ?string
    {
        return $this->rolesWorkflow;
    }

    public function setRolesWorkflow(?string $rolesWorkflow): self
    {
        $this->rolesWorkflow = $rolesWorkflow;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(?\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getActions(): ?string
    {
        return $this->actions;
    }

    public function setActions(?string $actions): self
    {
        $this->actions = $actions;

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getFormation(): Collection
    {
        return $this->formation;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formation->contains($formation)) {
            $this->formation[] = $formation;
            $formation->setWorkflow($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formation->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getWorkflow() === $this) {
                $formation->setWorkflow(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setWorkflow($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getWorkflow() === $this) {
                $user->setWorkflow(null);
            }
        }

        return $this;
    }
}
