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
     * @ORM\ManyToOne(targetEntity=HoraireTypeCours::class, inversedBy="nbGroupeTypeCoursHasCours")
     */
    private $horaireTypeCours;

    /**
     * @ORM\ManyToOne(targetEntity=Cours::class, inversedBy="nbGroupeTypeCoursHasCours")
     */
    private $cours;

    /**
     * @ORM\ManyToOne(targetEntity=CoutHETD::class, inversedBy="nbGroupeTypeCoursHasCours")
     */
    private $coutHETD;

    /**
     * @ORM\ManyToOne(targetEntity=NbGroupeTypeCours::class, inversedBy="nbGroupeTypeCoursHasCours")
     */
    private $nbGroupeTypeCours;

    public function __construct()
    {
        //$this->nbGroupeTypeCoursHasCours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCours(): ?Cours
    {
        return $this->cours;
    }

    public function setCours(?Cours $cours): self
    {
        $this->cours = $cours;

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

   
}
