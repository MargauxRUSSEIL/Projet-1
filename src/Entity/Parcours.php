<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ParcoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ParcoursRepository::class)
 */
class Parcours
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
    private $structureProlongee;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $structureBasse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

  

    /**
     * @ORM\OneToMany(targetEntity=Semestre::class, mappedBy="parcours", cascade={"persist", "remove"})
     */
    private $semestre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelleParcours;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelleParcoursApogee;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secondVET;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $annuOuSemest;

    /**
     * @ORM\ManyToOne(targetEntity=Formation::class, inversedBy="parcours")
     */
    private $formation;

    /**
     * @ORM\OneToOne(targetEntity=MCC::class, mappedBy="parcours", cascade={"persist", "remove"})
     */
    private $mCC;

    public function __construct()
    {
        $this->semestre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStructureProlongee(): ?string
    {
        return $this->structureProlongee;
    }

    public function setStructureProlongee(?string $structureProlongee): self
    {
        $this->structureProlongee = $structureProlongee;

        return $this;
    }

    public function getStructureBasse(): ?string
    {
        return $this->structureBasse;
    }

    public function setStructureBasse(?string $structureBasse): self
    {
        $this->structureBasse = $structureBasse;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|Semestre[]
     */
    public function getSemestre(): Collection
    {
        return $this->semestre;
    }

    public function addSemestre(Semestre $semestre): self
    {
        if (!$this->semestre->contains($semestre)) {
            $this->semestre[] = $semestre;
            $semestre->setParcours($this);
        }

        return $this;
    }

    public function removeSemestre(Semestre $semestre): self
    {
        if ($this->semestre->removeElement($semestre)) {
            // set the owning side to null (unless already changed)
            if ($semestre->getParcours() === $this) {
                $semestre->setParcours(null);
            }
        }

        return $this;
    }

    public function getLibelleParcours(): ?string
    {
        return $this->libelleParcours;
    }

    public function setLibelleParcours(?string $libelleParcours): self
    {
        $this->libelleParcours = $libelleParcours;

        return $this;
    }

    public function getLibelleParcoursApogee(): ?string
    {
        return $this->libelleParcoursApogee;
    }

    public function setLibelleParcoursApogee(?string $libelleParcoursApogee): self
    {
        $this->libelleParcoursApogee = $libelleParcoursApogee;

        return $this;
    }

    public function getSecondVET(): ?string
    {
        return $this->secondVET;
    }

    public function setSecondVET(?string $secondVET): self
    {
        $this->secondVET = $secondVET;

        return $this;
    }

    public function getAnnuOuSemest(): ?string
    {
        return $this->annuOuSemest;
    }

    public function setAnnuOuSemest(?string $annuOuSemest): self
    {
        $this->annuOuSemest = $annuOuSemest;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }

    public function getMCC(): ?MCC
    {
        return $this->mCC;
    }

    public function setMCC(?MCC $mCC): self
    {
        // unset the owning side of the relation if necessary
        if ($mCC === null && $this->mCC !== null) {
            $this->mCC->setParcours(null);
        }

        // set the owning side of the relation if necessary
        if ($mCC !== null && $mCC->getParcours() !== $this) {
            $mCC->setParcours($this);
        }

        $this->mCC = $mCC;

        return $this;
    }
}
