<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CoursRepository;
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
     * @ORM\ManyToOne(targetEntity=UE::class, inversedBy="cours")
     */
    private $uE;

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

    public function getUE(): ?UE
    {
        return $this->uE;
    }

    public function setUE(?UE $uE): self
    {
        $this->uE = $uE;

        return $this;
    }
}
