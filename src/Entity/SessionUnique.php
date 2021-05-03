<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SessionUniqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=SessionUniqueRepository::class)
 */
class SessionUnique
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
    private $typeEpreuve;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $regleCalcul;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $session;

    /**
     * @ORM\ManyToMany(targetEntity=ControleConnaissance::class, inversedBy="sessionUniques")
     */
    private $controleConnaissances;

    public function __construct()
    {
        $this->controleConnaissances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeEpreuve(): ?string
    {
        return $this->typeEpreuve;
    }

    public function setTypeEpreuve(?string $typeEpreuve): self
    {
        $this->typeEpreuve = $typeEpreuve;

        return $this;
    }

    public function getRegleCalcul(): ?string
    {
        return $this->regleCalcul;
    }

    public function setRegleCalcul(?string $regleCalcul): self
    {
        $this->regleCalcul = $regleCalcul;

        return $this;
    }

    public function getSession(): ?string
    {
        return $this->session;
    }

    public function setSession(?string $session): self
    {
        $this->session = $session;

        return $this;
    }

    /**
     * @return Collection|ControleConnaissance[]
     */
    public function getControleConnaissances(): Collection
    {
        return $this->controleConnaissances;
    }

    public function addControleConnaissance(ControleConnaissance $controleConnaissance): self
    {
        if (!$this->controleConnaissances->contains($controleConnaissance)) {
            $this->controleConnaissances[] = $controleConnaissance;
        }

        return $this;
    }

    public function removeControleConnaissance(ControleConnaissance $controleConnaissance): self
    {
        $this->controleConnaissances->removeElement($controleConnaissance);

        return $this;
    }

}
