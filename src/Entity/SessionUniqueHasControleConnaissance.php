<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SessionUniqueHasControleConnaissanceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=SessionUniqueHasControleConnaissanceRepository::class)
 */
class SessionUniqueHasControleConnaissance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=SessionUnique::class, mappedBy="sessionUniqueHasControleConnaissance", cascade={"persist", "remove"})
     */
    private $sessionUnique;

    /**
     * @ORM\OneToMany(targetEntity=ControleConnaissance::class, mappedBy="sessionUniqueHasControleConnaissance", cascade={"persist", "remove"})
     */
    private $controleConnaissance;

    /**
     * @ORM\ManyToOne(targetEntity=Competences::class, inversedBy="sessionUniqueHasControleConnaissance")
     */
    private $competences;

    public function __construct()
    {
        $this->sessionUnique = new ArrayCollection();
        $this->controleConnaissance = new ArrayCollection();
        //$this->competences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|SessionUnique[]
     */
    public function getSessionUnique(): Collection
    {
        return $this->sessionUnique;
    }

    public function addSessionUnique(SessionUnique $sessionUnique): self
    {
        if (!$this->sessionUnique->contains($sessionUnique)) {
            $this->sessionUnique[] = $sessionUnique;
            $sessionUnique->setSessionUniqueHasControleConnaissance($this);
        }

        return $this;
    }

    public function removeSessionUnique(SessionUnique $sessionUnique): self
    {
        if ($this->sessionUnique->removeElement($sessionUnique)) {
            // set the owning side to null (unless already changed)
            if ($sessionUnique->getSessionUniqueHasControleConnaissance() === $this) {
                $sessionUnique->setSessionUniqueHasControleConnaissance(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ControleConnaissance[]
     */
    public function getControleConnaissance(): Collection
    {
        return $this->controleConnaissance;
    }

    public function addControleConnaissance(ControleConnaissance $controleConnaissance): self
    {
        if (!$this->controleConnaissance->contains($controleConnaissance)) {
            $this->controleConnaissance[] = $controleConnaissance;
            $controleConnaissance->setSessionUniqueHasControleConnaissance($this);
        }

        return $this;
    }

    public function removeControleConnaissance(ControleConnaissance $controleConnaissance): self
    {
        if ($this->controleConnaissance->removeElement($controleConnaissance)) {
            // set the owning side to null (unless already changed)
            if ($controleConnaissance->getSessionUniqueHasControleConnaissance() === $this) {
                $controleConnaissance->setSessionUniqueHasControleConnaissance(null);
            }
        }

        return $this;
    }

    public function getCompetences(): ?Competences
    {
        return $this->competences;
    }

    public function setCompetences(?Competences $competences): self
    {
        $this->competences = $competences;

        return $this;
    }

}
