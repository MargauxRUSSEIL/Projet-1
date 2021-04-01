<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RolesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=RolesRepository::class)
 */
class Roles
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
    private $libelleRole;

    /**
     * @ORM\OneToMany(targetEntity=RolesUser::class, mappedBy="roles")
     */
    private $rolesUser;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->rolesUser = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleRole(): ?string
    {
        return $this->libelleRole;
    }

    public function setLibelleRole(?string $libelleRole): self
    {
        $this->libelleRole = $libelleRole;

        return $this;
    }

    /**
     * @return Collection|RolesUser[]
     */
    public function getRolesUser(): Collection
    {
        return $this->rolesUser;
    }

    public function addRolesUser(RolesUser $rolesUser): self
    {
        if (!$this->rolesUser->contains($rolesUser)) {
            $this->rolesUser[] = $rolesUser;
            $rolesUser->setRoles($this);
        }

        return $this;
    }

    public function removeRolesUser(RolesUser $rolesUser): self
    {
        if ($this->rolesUser->removeElement($rolesUser)) {
            // set the owning side to null (unless already changed)
            if ($rolesUser->getRoles() === $this) {
                $rolesUser->setRoles(null);
            }
        }

        return $this;
    }
}