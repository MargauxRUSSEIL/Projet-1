<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SessionUniqueHasTypeControleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=SessionUniqueHasTypeControleRepository::class)
 */
class SessionUniqueHasTypeControle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=SessionUnique::class, mappedBy="sessionUniqueHasTypeControle", cascade={"persist", "remove"})
     */
    private $sessionUnique;

    /**
     * @ORM\OneToMany(targetEntity=TypeControle::class, mappedBy="sessionUniqueHasTypeControle", cascade={"persist", "remove"})
     */
    private $typeControle;

    /**
     * @ORM\OneToMany(targetEntity=Competences::class, mappedBy="sessionUniqueHasTypeControle", cascade={"persist", "remove"})
     */
    private $competences;

    public function __construct()
    {
        $this->sessionUnique = new ArrayCollection();
        $this->typeControle = new ArrayCollection();
        $this->competences = new ArrayCollection();
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
            $sessionUnique->setSessionUniqueHasTypeControle($this);
        }

        return $this;
    }

    public function removeSessionUnique(SessionUnique $sessionUnique): self
    {
        if ($this->sessionUnique->removeElement($sessionUnique)) {
            // set the owning side to null (unless already changed)
            if ($sessionUnique->getSessionUniqueHasTypeControle() === $this) {
                $sessionUnique->setSessionUniqueHasTypeControle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TypeControle[]
     */
    public function getTypeControle(): Collection
    {
        return $this->typeControle;
    }

    public function addTypeControle(TypeControle $typeControle): self
    {
        if (!$this->typeControle->contains($typeControle)) {
            $this->typeControle[] = $typeControle;
            $typeControle->setSessionUniqueHasTypeControle($this);
        }

        return $this;
    }

    public function removeTypeControle(TypeControle $typeControle): self
    {
        if ($this->typeControle->removeElement($typeControle)) {
            // set the owning side to null (unless already changed)
            if ($typeControle->getSessionUniqueHasTypeControle() === $this) {
                $typeControle->setSessionUniqueHasTypeControle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Competences[]
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(Competences $competence): self
    {
        if (!$this->competences->contains($competence)) {
            $this->competences[] = $competence;
            $competence->setSessionUniqueHasTypeControle($this);
        }

        return $this;
    }

    public function removeCompetence(Competences $competence): self
    {
        if ($this->competences->removeElement($competence)) {
            // set the owning side to null (unless already changed)
            if ($competence->getSessionUniqueHasTypeControle() === $this) {
                $competence->setSessionUniqueHasTypeControle(null);
            }
        }

        return $this;
    }
}
