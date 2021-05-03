<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ControleConnaissancesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ControleConnaissancesRepository::class)
 */
class ControleConnaissances
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Cours::class, inversedBy="controleConnaissance")
     */
    private $cours;

    /**
     * @ORM\ManyToOne(targetEntity=Competences::class, inversedBy="controleConnaissance")
     */
    private $competences;

    /**
     * @ORM\ManyToMany(targetEntity=SessionUnique::class, inversedBy="controleConnaissances")
     */
    private $sessionUniques;

    public function __construct()
    {
        $this->sessionUniques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCours(): ?Cours
    {
        return $this->cours;
    }

    public function setCours(?Cours $cours): self
    {
        $this->cours = $cours;

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

    /**
     * @return Collection|SessionUnique[]
     */
    public function getSessionUniques(): Collection
    {
        return $this->sessionUniques;
    }

    public function addSessionUnique(SessionUnique $sessionUnique): self
    {
        if (!$this->sessionUniques->contains($sessionUnique)) {
            $this->sessionUniques[] = $sessionUnique;
        }

        return $this;
    }

    public function removeSessionUnique(SessionUnique $sessionUnique): self
    {
        $this->sessionUniques->removeElement($sessionUnique);

        return $this;
    }
}
