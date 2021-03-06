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
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

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
    private $commentaire;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=Semestre::class, mappedBy="parcours", cascade={"persist", "remove"})
     */
    private $semestres;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelleParcoursApogee;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secondVET;

    /**
     * @ORM\ManyToOne(targetEntity=Formation::class, inversedBy="parcours")
     */
    private $formation;

    /**
     * @ORM\OneToOne(targetEntity=MCC::class, mappedBy="parcours", cascade={"persist", "remove"})
     */
    private $mcc;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $annuel;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="parcours")
     */
    private $user;

    public function __construct()
    {
        $this->semestres = new ArrayCollection();
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
    public function getSemestres(): Collection
    {
        return $this->semestres;
    }

    public function addSemestre(Semestre $semestre): self
    {
        if (!$this->semestres->contains($semestre)) {
            $this->semestres[] = $semestre;
            $semestre->setParcours($this);
        }

        return $this;
    }

    public function removeSemestre(Semestre $semestre): self
    {
        if ($this->semestres->removeElement($semestre)) {
            // set the owning side to null (unless already changed)
            if ($semestre->getParcours() === $this) {
                $semestre->setParcours(null);
            }
        }

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

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
        return $this->mcc;
    }

    public function setMCC(?MCC $mcc): self
    {
        // unset the owning side of the relation if necessary
        if ($mcc === null && $this->mcc !== null) {
            $this->mcc->setParcours(null);
        }

        // set the owning side of the relation if necessary
        if ($mcc !== null && $mcc->getParcours() !== $this) {
            $mcc->setParcours($this);
        }

        $this->mcc = $mcc;

        return $this;
    }

    public function getAnnuel(): ?bool
    {
        return $this->annuel;
    }

    public function setAnnuel(?bool $annuel): self
    {
        $this->annuel = $annuel;

        return $this;
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
}
