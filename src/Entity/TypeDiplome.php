<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TypeDiplomeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TypeDiplomeRepository::class)
 */
class TypeDiplome
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
    private $libelle;

    /**
     * @ORM\OneToOne(targetEntity=Caracteristiques::class, mappedBy="typeDiplome", cascade={"persist", "remove"})
     */
    private $caracteristiques;

    /**
     * @ORM\ManyToMany(targetEntity=Mention::class, inversedBy="typeDiplomes")
     */
    private $mentions;

    /**
     * @ORM\OneToMany(targetEntity=Formation::class, mappedBy="typeDiplome", cascade={"persist", "remove"})
     */
    private $formations;

    public function __construct()
    {
        $this->mentions = new ArrayCollection();
        $this->formations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCaracteristiques(): ?Caracteristiques
    {
        return $this->caracteristiques;
    }

    public function setCaracteristiques(?Caracteristiques $caracteristiques): self
    {
        // unset the owning side of the relation if necessary
        if ($caracteristiques === null && $this->caracteristiques !== null) {
            $this->caracteristiques->setTypeDiplome(null);
        }

        // set the owning side of the relation if necessary
        if ($caracteristiques !== null && $caracteristiques->getTypeDiplome() !== $this) {
            $caracteristiques->setTypeDiplome($this);
        }

        $this->caracteristiques = $caracteristiques;

        return $this;
    }

    /**
     * @return Collection|Mention[]
     */
    public function getMentions(): Collection
    {
        return $this->mentions;
    }

    public function addMention(Mention $mention): self
    {
        if (!$this->mentions->contains($mention)) {
            $this->mentions[] = $mention;
        }

        return $this;
    }

    public function removeMention(Mention $mention): self
    {
        $this->mentions->removeElement($mention);

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->setTypeDiplome($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formations->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getTypeDiplome() === $this) {
                $formation->setTypeDiplome(null);
            }
        }

        return $this;
    }

}
