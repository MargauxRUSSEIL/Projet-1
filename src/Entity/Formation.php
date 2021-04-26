<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=FormationRepository::class)
 */
class Formation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $structureHaute;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codeDiplome;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ecoleDoctorale;

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
     * equivalent à date création
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * equivalent à date modification
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $VDI;

    /**
     * @ORM\OneToMany(targetEntity=Parcours::class, mappedBy="formation", cascade={"persist", "remove"})
     */
    private $parcours;

    /**
     * @ORM\ManyToOne(targetEntity=Localisation::class, inversedBy="formations")
     */
    private $localisation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @ORM\OneToOne(targetEntity=Creationformation::class, mappedBy="formation", cascade={"persist", "remove"})
     */
    private $creationformation;

    /**
     * @ORM\ManyToOne(targetEntity=TypeDiplome::class, inversedBy="formations")
     */
    private $typeDiplome;

    /**
     * @ORM\ManyToOne(targetEntity=Domaine::class, inversedBy="formations")
     */
    private $domaine;

    /**
     * @ORM\ManyToOne(targetEntity=Mention::class, inversedBy="formations")
     */
    private $mention;

    /**
     * @ORM\ManyToOne(targetEntity=Niveau::class, inversedBy="formations")
     */
    private $niveau;

    /**
     * @ORM\OneToMany(targetEntity=MCC::class, mappedBy="formation")
     */
    private $mccs;

    /**
     * @ORM\OneToMany(targetEntity=Semestre::class, mappedBy="formation")
     */
    private $semestres;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="formations")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity=Composante::class, inversedBy="formations")
     */
    private $composante;

    public function __construct()
    {
        $this->parcours = new ArrayCollection();
        $this->mcc = new ArrayCollection();
        $this->semestre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStructureHaute(): ?int
    {
        return $this->structureHaute;
    }

    public function setStructureHaute(?int $structureHaute): self
    {
        $this->structureHaute = $structureHaute;

        return $this;
    }

    public function getCodeDiplome(): ?string
    {
        return $this->codeDiplome;
    }

    public function setCodeDiplome(?string $codeDiplome): self
    {
        $this->codeDiplome = $codeDiplome;

        return $this;
    }

    public function getEcoleDoctorale(): ?string
    {
        return $this->ecoleDoctorale;
    }

    public function setEcoleDoctorale(?string $ecoleDoctorale): self
    {
        $this->ecoleDoctorale = $ecoleDoctorale;

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

    public function getVDI(): ?string
    {
        return $this->VDI;
    }

    public function setVDI(?string $VDI): self
    {
        $this->VDI = $VDI;

        return $this;
    }

    /**
     * @return Collection|Parcours[]
     */
    public function getParcours(): Collection
    {
        return $this->parcours;
    }

    public function addParcours(Parcours $parcours): self
    {
        if (!$this->parcours->contains($parcours)) {
            $this->parcours[] = $parcours;
            $parcours->setFormation($this);
        }

        return $this;
    }

    public function removeParcours(Parcours $parcours): self
    {
        if ($this->parcours->removeElement($parcours)) {
            // set the owning side to null (unless already changed)
            if ($parcours->getFormation() === $this) {
                $parcours->setFormation(null);
            }
        }

        return $this;
    }

    public function getLocalisation(): ?Localisation
    {
        return $this->localisation;
    }

    public function setLocalisation(?Localisation $localisation): self
    {
        $this->localisation = $localisation;

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

    public function getCreationformation(): ?Creationformation
    {
        return $this->creationformation;
    }

    public function setCreationformation(?Creationformation $creationformation): self
    {
        // unset the owning side of the relation if necessary
        if ($creationformation === null && $this->creationformation !== null) {
            $this->creationformation->setFormation(null);
        }

        // set the owning side of the relation if necessary
        if ($creationformation !== null && $creationformation->getFormation() !== $this) {
            $creationformation->setFormation($this);
        }

        $this->creationformation = $creationformation;

        return $this;
    }

    public function getTypeDiplome(): ?TypeDiplome
    {
        return $this->typeDiplome;
    }

    public function setTypeDiplome(?TypeDiplome $typeDiplome): self
    {
        $this->typeDiplome = $typeDiplome;

        return $this;
    }

    public function getDomaine(): ?Domaine
    {
        return $this->domaine;
    }

    public function setDomaine(?Domaine $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getMention(): ?Mention
    {
        return $this->mention;
    }

    public function setMention(?Mention $mention): self
    {
        $this->mention = $mention;

        return $this;
    }

    public function getNiveau(): ?Niveau
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveau $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * @return Collection|MCC[]
     */
    public function getMccs(): Collection
    {
        return $this->mccs;
    }

    public function addMcc(MCC $mcc): self
    {
        if (!$this->mccs->contains($mcc)) {
            $this->mccs[] = $mcc;
            $mcc->setFormation($this);
        }

        return $this;
    }

    public function removeMcc(MCC $mcc): self
    {
        if ($this->mccs->removeElement($mcc)) {
            // set the owning side to null (unless already changed)
            if ($mcc->getFormation() === $this) {
                $mcc->setFormation(null);
            }
        }

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
            $semestre->setFormation($this);
        }

        return $this;
    }

    public function removeSemestre(Semestre $semestre): self
    {
        if ($this->semestres->removeElement($semestre)) {
            // set the owning side to null (unless already changed)
            if ($semestre->getFormation() === $this) {
                $semestre->setFormation(null);
            }
        }

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

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getComposante(): ?Composante
    {
        return $this->composante;
    }

    public function setComposante(?Composante $composante): self
    {
        $this->composante = $composante;

        return $this;
    }
}
