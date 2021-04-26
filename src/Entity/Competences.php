<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompetencesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CompetencesRepository::class)
 */
class Competences
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
    private $blocs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $seuilBlocs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ECT;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $COEFF;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $seuil;

    /**
     * @ORM\OneToMany(targetEntity=SessionUniqueHasControleConnaissance::class, mappedBy="competences")
     */
    private $sessionUniqueHasControleConnaissance;

    public function __construct()
    {
        $this->sessionUniqueHasControleConnaissance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBlocs(): ?string
    {
        return $this->blocs;
    }

    public function setBlocs(?string $blocs): self
    {
        $this->blocs = $blocs;

        return $this;
    }

    public function getSeuilBlocs(): ?string
    {
        return $this->seuilBlocs;
    }

    public function setSeuilBlocs(?string $seuilBlocs): self
    {
        $this->seuilBlocs = $seuilBlocs;

        return $this;
    }

    public function getECT(): ?string
    {
        return $this->ECT;
    }

    public function setECT(?string $ECT): self
    {
        $this->ECT = $ECT;

        return $this;
    }

    public function getCOEFF(): ?string
    {
        return $this->COEFF;
    }

    public function setCOEFF(?string $COEFF): self
    {
        $this->COEFF = $COEFF;

        return $this;
    }

    public function getSeuil(): ?string
    {
        return $this->seuil;
    }

    public function setSeuil(?string $seuil): self
    {
        $this->seuil = $seuil;

        return $this;
    }

    /**
     * @return Collection|SessionUniqueHasControleConnaissance[]
     */
    public function getSessionUniqueHasControleConnaissance(): Collection
    {
        return $this->sessionUniqueHasControleConnaissance;
    }

    public function addSessionUniqueHasControleConnaissance(SessionUniqueHasControleConnaissance $sessionUniqueHasControleConnaissance): self
    {
        if (!$this->sessionUniqueHasControleConnaissance->contains($sessionUniqueHasControleConnaissance)) {
            $this->sessionUniqueHasControleConnaissance[] = $sessionUniqueHasControleConnaissance;
            $sessionUniqueHasControleConnaissance->setCompetences($this);
        }

        return $this;
    }

    public function removeSessionUniqueHasControleConnaissance(SessionUniqueHasControleConnaissance $sessionUniqueHasControleConnaissance): self
    {
        if ($this->sessionUniqueHasControleConnaissance->removeElement($sessionUniqueHasControleConnaissance)) {
            // set the owning side to null (unless already changed)
            if ($sessionUniqueHasControleConnaissance->getCompetences() === $this) {
                $sessionUniqueHasControleConnaissance->setCompetences(null);
            }
        }

        return $this;
    }

}
