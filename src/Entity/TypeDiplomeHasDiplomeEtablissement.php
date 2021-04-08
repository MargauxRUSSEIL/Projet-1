<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TypeDiplomeHasDiplomeEtablissementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TypeDiplomeHasDiplomeEtablissementRepository::class)
 */
class TypeDiplomeHasDiplomeEtablissement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=TypeDiplome::class, mappedBy="typeDiplomeHasDiplomeEtablissement", cascade={"persist", "remove"})
     */
    private $typeDiplome;

    /**
     * @ORM\OneToMany(targetEntity=DiplomeEtablissement::class, mappedBy="typeDiplomeHasDiplomeEtablissement", cascade={"persist", "remove"})
     */
    private $diplomeEtablissement;

    /**
     * @ORM\OneToMany(targetEntity=FormationNonDiplomante::class, mappedBy="typeDiplomeHasDiplomeEtablissement", cascade={"persist", "remove"})
     */
    private $formationNonDiplomante;

    public function __construct()
    {
        $this->typeDiplome = new ArrayCollection();
        $this->diplomeEtablissement = new ArrayCollection();
        $this->formationNonDiplomante = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $typeDiplome->setTypeDiplomeHasDiplomeEtablissement($this);
        }

        return $this;
    }

    public function removeTypeDiplome(TypeDiplome $typeDiplome): self
    {
        if ($this->typeDiplome->removeElement($typeDiplome)) {
            // set the owning side to null (unless already changed)
            if ($typeDiplome->getTypeDiplomeHasDiplomeEtablissement() === $this) {
                $typeDiplome->setTypeDiplomeHasDiplomeEtablissement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DiplomeEtablissement[]
     */
    public function getDiplomeEtablissement(): Collection
    {
        return $this->diplomeEtablissement;
    }

    public function addDiplomeEtablissement(DiplomeEtablissement $diplomeEtablissement): self
    {
        if (!$this->diplomeEtablissement->contains($diplomeEtablissement)) {
            $this->diplomeEtablissement[] = $diplomeEtablissement;
            $diplomeEtablissement->setTypeDiplomeHasDiplomeEtablissement($this);
        }

        return $this;
    }

    public function removeDiplomeEtablissement(DiplomeEtablissement $diplomeEtablissement): self
    {
        if ($this->diplomeEtablissement->removeElement($diplomeEtablissement)) {
            // set the owning side to null (unless already changed)
            if ($diplomeEtablissement->getTypeDiplomeHasDiplomeEtablissement() === $this) {
                $diplomeEtablissement->setTypeDiplomeHasDiplomeEtablissement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FormationNonDiplomante[]
     */
    public function getFormationNonDiplomante(): Collection
    {
        return $this->formationNonDiplomante;
    }

    public function addFormationNonDiplomante(FormationNonDiplomante $formationNonDiplomante): self
    {
        if (!$this->formationNonDiplomante->contains($formationNonDiplomante)) {
            $this->formationNonDiplomante[] = $formationNonDiplomante;
            $formationNonDiplomante->setTypeDiplomeHasDiplomeEtablissement($this);
        }

        return $this;
    }

    public function removeFormationNonDiplomante(FormationNonDiplomante $formationNonDiplomante): self
    {
        if ($this->formationNonDiplomante->removeElement($formationNonDiplomante)) {
            // set the owning side to null (unless already changed)
            if ($formationNonDiplomante->getTypeDiplomeHasDiplomeEtablissement() === $this) {
                $formationNonDiplomante->setTypeDiplomeHasDiplomeEtablissement(null);
            }
        }

        return $this;
    }
}
