<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CoursRepository::class)
 */
class Cours
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
    private $codeAPOGEE;

    /**
     * @ORM\ManyToMany(targetEntity=UE::class, mappedBy="cours", cascade={"persist", "remove"})
     */
    private $uEs;

    /**
     * @ORM\OneToMany(targetEntity=ControleConnaissance::class, mappedBy="cours", cascade={"persist", "remove"})
     */
    private $controleConnaissance;

    /**
     * @ORM\OneToMany(targetEntity=NbGroupeTypeCoursHasCours::class, mappedBy="cours", cascade={"persist", "remove"})
     */
    private $nbGroupeTypeCoursHasCours;

    public function __construct()
    {
        $this->uEs = new ArrayCollection();
        $this->controleConnaissance = new ArrayCollection();
        $this->nbGroupeTypeCoursHasCours = new ArrayCollection();
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

    public function getCodeAPOGEE(): ?string
    {
        return $this->codeAPOGEE;
    }

    public function setCodeAPOGEE(?string $codeAPOGEE): self
    {
        $this->codeAPOGEE = $codeAPOGEE;

        return $this;
    }

    /**
     * @return Collection|UE[]
     */
    public function getUEs(): Collection
    {
        return $this->uEs;
    }

    public function addUE(UE $uE): self
    {
        if (!$this->uEs->contains($uE)) {
            $this->uEs[] = $uE;
            $uE->addCour($this);
        }

        return $this;
    }

    public function removeUE(UE $uE): self
    {
        if ($this->uEs->removeElement($uE)) {
            $uE->removeCour($this);
        }

        return $this;
    }

     /**
     * @return Collection|ControleConnaissance[]
     */
    public function getControleConnaissance(): Collection
    {
        return $this->controleConnaissance;
    }

    public function addControleConnaissance(ControleConnaissance $controleConnaissance): self
    {
        if (!$this->controleConnaissance->contains($controleConnaissance)) {
            $this->controleConnaissance[] = $controleConnaissance;
            $controleConnaissance->setCours($this);
        }

        return $this;
    }

    public function removeControleConnaissance(ControleConnaissance $controleConnaissance): self
    {
        if ($this->controleConnaissance->removeElement($controleConnaissance)) {
            // set the owning side to null (unless already changed)
            if ($controleConnaissance->getCours() === $this) {
                $controleConnaissance->setCours(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|NbGroupeTypeCoursHasCours[]
     */
    public function getNbGroupeTypeCoursHasCours(): Collection
    {
        return $this->nbGroupeTypeCoursHasCours;
    }

    public function addNbGroupeTypeCoursHasCour(NbGroupeTypeCoursHasCours $nbGroupeTypeCoursHasCour): self
    {
        if (!$this->nbGroupeTypeCoursHasCours->contains($nbGroupeTypeCoursHasCour)) {
            $this->nbGroupeTypeCoursHasCours[] = $nbGroupeTypeCoursHasCour;
            $nbGroupeTypeCoursHasCour->setCours($this);
        }

        return $this;
    }

    public function removeNbGroupeTypeCoursHasCour(NbGroupeTypeCoursHasCours $nbGroupeTypeCoursHasCour): self
    {
        if ($this->nbGroupeTypeCoursHasCours->removeElement($nbGroupeTypeCoursHasCour)) {
            // set the owning side to null (unless already changed)
            if ($nbGroupeTypeCoursHasCour->getCours() === $this) {
                $nbGroupeTypeCoursHasCour->setCours(null);
            }
        }

        return $this;
    }

}
