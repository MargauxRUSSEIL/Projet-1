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
    private $typeFormation;

  

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $VDI;

    /**
     * @ORM\OneToMany(targetEntity=TypeDiplome::class, mappedBy="formation", cascade={"persist", "remove"})
     */
    private $typeDiplome;

    /**
     * @ORM\ManyToOne(targetEntity=Workflow::class, inversedBy="formation")
     */
    private $workflow;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statuts;

    /**
     * @ORM\OneToMany(targetEntity=Parcours::class, mappedBy="formation", cascade={"persist", "remove"})
     */
    private $parcours;

    /**
     * @ORM\ManyToOne(targetEntity=Mention::class)
     */
    private $mention;

    /**
     * @ORM\ManyToOne(targetEntity=Composante::class, inversedBy="formation")
     */
    private $composante;

    /**
     * @ORM\ManyToOne(targetEntity=Localisation::class, inversedBy="formation")
     */
    private $localisation;

    public function __construct()
    {
        $this->parcours = new ArrayCollection();
        $this->typeDiplome = new ArrayCollection();
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

    public function getTypeFormation(): ?string
    {
        return $this->typeFormation;
    }

    public function setTypeFormation(?string $typeFormation): self
    {
        $this->typeFormation = $typeFormation;

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
     * @return Collection|TypeDiplome[]
     */
    public function getTypeDiplome(): Collection
    {
        return $this->typeDiplome;
    }

    public function addTypeDiplome(TypeDiplome $typeDiplome): self
    {
        if (!$this->typeDiplome->contains($typeDiplome)) {
            $this->typeDiplome[] = $typeDiplome;
            $typeDiplome->setFormation($this);
        }

        return $this;
    }

    public function removeTypeDiplome(TypeDiplome $typeDiplome): self
    {
        if ($this->typeDiplome->removeElement($typeDiplome)) {
            // set the owning side to null (unless already changed)
            if ($typeDiplome->getFormation() === $this) {
                $typeDiplome->setFormation(null);
            }
        }

        return $this;
    }

    public function getWorkflow(): ?Workflow
    {
        return $this->workflow;
    }

    public function setWorkflow(?Workflow $workflow): self
    {
        $this->workflow = $workflow;

        return $this;
    }

    public function getStatuts(): ?string
    {
        return $this->statuts;
    }

    public function setStatuts(?string $statuts): self
    {
        $this->statuts = $statuts;

        return $this;
    }

    /**
     * @return Collection|Parcours[]
     */
    public function getParcours(): Collection
    {
        return $this->parcours;
    }

    public function addParcour(Parcours $parcour): self
    {
        if (!$this->parcours->contains($parcour)) {
            $this->parcours[] = $parcour;
            $parcour->setFormation($this);
        }

        return $this;
    }

    public function removeParcour(Parcours $parcour): self
    {
        if ($this->parcours->removeElement($parcour)) {
            // set the owning side to null (unless already changed)
            if ($parcour->getFormation() === $this) {
                $parcour->setFormation(null);
            }
        }

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

    public function getComposante(): ?Composante
    {
        return $this->composante;
    }

    public function setComposante(?Composante $composante): self
    {
        $this->composante = $composante;

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
}
