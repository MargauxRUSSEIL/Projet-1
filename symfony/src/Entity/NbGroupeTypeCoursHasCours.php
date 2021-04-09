<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NbGroupeTypeCoursHasCoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=NbGroupeTypeCoursHasCoursRepository::class)
 */
class NbGroupeTypeCoursHasCours
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=CoutHETD::class, mappedBy="nbGroupeTypeCoursHasCours")
     */
    private $coutHETD;

    /**
     * @ORM\OneToMany(targetEntity=NbGroupeTypeCours::class, mappedBy="nbGroupeTypeCoursHasCours")
     */
    private $nbGroupeTypeCours;

    /**
     * @ORM\OneToMany(targetEntity=Cours::class, mappedBy="nbGroupeTypeCoursHasCours")
     */
    private $cours;

    /**
     * @ORM\OneToMany(targetEntity=HoraireTypeCours::class, mappedBy="nbGroupeTypeCoursHasCours")
     */
    private $horaireTypeCours;

    public function __construct()
    {
        $this->coutHETD = new ArrayCollection();
        $this->nbGroupeTypeCours = new ArrayCollection();
        $this->cours = new ArrayCollection();
        $this->horaireTypeCours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|CoutHETD[]
     */
    public function getCoutHETD(): Collection
    {
        return $this->coutHETD;
    }

    public function addCoutHETD(CoutHETD $coutHETD): self
    {
        if (!$this->coutHETD->contains($coutHETD)) {
            $this->coutHETD[] = $coutHETD;
            $coutHETD->setNbGroupeTypeCoursHasCours($this);
        }

        return $this;
    }

    public function removeCoutHETD(CoutHETD $coutHETD): self
    {
        if ($this->coutHETD->removeElement($coutHETD)) {
            // set the owning side to null (unless already changed)
            if ($coutHETD->getNbGroupeTypeCoursHasCours() === $this) {
                $coutHETD->setNbGroupeTypeCoursHasCours(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|NbGroupeTypeCours[]
     */
    public function getNbGroupeTypeCours(): Collection
    {
        return $this->nbGroupeTypeCours;
    }

    public function addNbGroupeTypeCour(NbGroupeTypeCours $nbGroupeTypeCour): self
    {
        if (!$this->nbGroupeTypeCours->contains($nbGroupeTypeCour)) {
            $this->nbGroupeTypeCours[] = $nbGroupeTypeCour;
            $nbGroupeTypeCour->setNbGroupeTypeCoursHasCours($this);
        }

        return $this;
    }

    public function removeNbGroupeTypeCour(NbGroupeTypeCours $nbGroupeTypeCour): self
    {
        if ($this->nbGroupeTypeCours->removeElement($nbGroupeTypeCour)) {
            // set the owning side to null (unless already changed)
            if ($nbGroupeTypeCour->getNbGroupeTypeCoursHasCours() === $this) {
                $nbGroupeTypeCour->setNbGroupeTypeCoursHasCours(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Cours[]
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function addCour(Cours $cour): self
    {
        if (!$this->cours->contains($cour)) {
            $this->cours[] = $cour;
            $cour->setNbGroupeTypeCoursHasCours($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): self
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getNbGroupeTypeCoursHasCours() === $this) {
                $cour->setNbGroupeTypeCoursHasCours(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|HoraireTypeCours[]
     */
    public function getHoraireTypeCours(): Collection
    {
        return $this->horaireTypeCours;
    }

    public function addHoraireTypeCour(HoraireTypeCours $horaireTypeCour): self
    {
        if (!$this->horaireTypeCours->contains($horaireTypeCour)) {
            $this->horaireTypeCours[] = $horaireTypeCour;
            $horaireTypeCour->setNbGroupeTypeCoursHasCours($this);
        }

        return $this;
    }

    public function removeHoraireTypeCour(HoraireTypeCours $horaireTypeCour): self
    {
        if ($this->horaireTypeCours->removeElement($horaireTypeCour)) {
            // set the owning side to null (unless already changed)
            if ($horaireTypeCour->getNbGroupeTypeCoursHasCours() === $this) {
                $horaireTypeCour->setNbGroupeTypeCoursHasCours(null);
            }
        }

        return $this;
    }
}
