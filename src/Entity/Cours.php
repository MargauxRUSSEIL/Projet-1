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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelleCours;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codeAPOGEE;

    /**
     * @ORM\OneToOne(targetEntity=HoraireTypeCours::class, inversedBy="cours", cascade={"persist", "remove"})
     */
    private $horaireTypeCours;

    /**
     * @ORM\OneToOne(targetEntity=CoutHETD::class, inversedBy="cours", cascade={"persist", "remove"})
     */
    private $coutHETD;

    /**
     * @ORM\OneToOne(targetEntity=NbGroupeTypeCours::class, inversedBy="cours", cascade={"persist", "remove"})
     */
    private $nbGroupeTypeCours;

    /**
     * @ORM\ManyToOne(targetEntity=NbGroupeTypeCoursHasCours::class, inversedBy="cours")
     */
    private $nbGroupeTypeCoursHasCours;

    /**
     * @ORM\ManyToMany(targetEntity=UE::class, mappedBy="cours")
     */
    private $uEs;

    public function __construct()
    {
        $this->uEs = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleCours(): ?string
    {
        return $this->libelleCours;
    }

    public function setLibelleCours(?string $libelleCours): self
    {
        $this->libelleCours = $libelleCours;

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

    public function getHoraireTypeCours(): ?HoraireTypeCours
    {
        return $this->horaireTypeCours;
    }

    public function setHoraireTypeCours(?HoraireTypeCours $horaireTypeCours): self
    {
        $this->horaireTypeCours = $horaireTypeCours;

        return $this;
    }

    public function getCoutHETD(): ?CoutHETD
    {
        return $this->coutHETD;
    }

    public function setCoutHETD(?CoutHETD $coutHETD): self
    {
        $this->coutHETD = $coutHETD;

        return $this;
    }

    public function getNbGroupeTypeCours(): ?NbGroupeTypeCours
    {
        return $this->nbGroupeTypeCours;
    }

    public function setNbGroupeTypeCours(?NbGroupeTypeCours $nbGroupeTypeCours): self
    {
        $this->nbGroupeTypeCours = $nbGroupeTypeCours;

        return $this;
    }

    public function getNbGroupeTypeCoursHasCours(): ?NbGroupeTypeCoursHasCours
    {
        return $this->nbGroupeTypeCoursHasCours;
    }

    public function setNbGroupeTypeCoursHasCours(?NbGroupeTypeCoursHasCours $nbGroupeTypeCoursHasCours): self
    {
        $this->nbGroupeTypeCoursHasCours = $nbGroupeTypeCoursHasCours;

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

   
}
