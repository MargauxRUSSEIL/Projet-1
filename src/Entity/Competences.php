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
     * @ORM\OneToMany(targetEntity=ControleConnaissances::class, mappedBy="competences")
     */
    private $controleConnaissance;

    public function __construct()
    {
        $this->controleConnaissance = new ArrayCollection();
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
     * @return Collection|ControleConnaissances[]
     */
    public function getControleConnaissance(): Collection
    {
        return $this->controleConnaissance;
    }

    public function addControleConnaissance(ControleConnaissances $controleConnaissance): self
    {
        if (!$this->controleConnaissance->contains($controleConnaissance)) {
            $this->controleConnaissance[] = $controleConnaissance;
            $controleConnaissance->setCompetences($this);
        }

        return $this;
    }

    public function removeControleConnaissance(ControleConnaissances $controleConnaissance): self
    {
        if ($this->controleConnaissance->removeElement($controleConnaissance)) {
            // set the owning side to null (unless already changed)
            if ($controleConnaissance->getCompetences() === $this) {
                $controleConnaissance->setCompetences(null);
            }
        }

        return $this;
    }

}
