<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RolesUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=RolesUserRepository::class)
 */
class RolesUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="userRoles")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Roles::class, inversedBy="rolesUser")
     */
    private $roles;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getRoles(): ?Roles
    {
        return $this->roles;
    }

    public function setRoles(?Roles $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
}
