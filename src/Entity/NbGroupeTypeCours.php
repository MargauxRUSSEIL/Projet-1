<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NbGroupeTypeCoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=NbGroupeTypeCoursRepository::class)
 */
class NbGroupeTypeCours
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
    private $CM;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TP;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TD;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre;

    /**
     * @ORM\OneToMany(targetEntity=NbGroupeTypeCoursHasCours::class, mappedBy="nbGroupeTypeCours", cascade={"persist", "remove"})
     */
    private $nbGroupeTypeCoursHasCours;

    public function __construct()
    {
        $this->nbGroupeTypeCoursHasCours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCM(): ?string
    {
        return $this->CM;
    }

    public function setCM(?string $CM): self
    {
        $this->CM = $CM;

        return $this;
    }

    public function getTP(): ?string
    {
        return $this->TP;
    }

    public function setTP(?string $TP): self
    {
        $this->TP = $TP;

        return $this;
    }

    public function getTD(): ?string
    {
        return $this->TD;
    }

    public function setTD(?string $TD): self
    {
        $this->TD = $TD;

        return $this;
    }

    public function getAutre(): ?string
    {
        return $this->autre;
    }

    public function setAutre(?string $autre): self
    {
        $this->autre = $autre;

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
            $nbGroupeTypeCoursHasCour->setNbGroupeTypeCours($this);
        }

        return $this;
    }

    public function removeNbGroupeTypeCoursHasCour(NbGroupeTypeCoursHasCours $nbGroupeTypeCoursHasCour): self
    {
        if ($this->nbGroupeTypeCoursHasCours->removeElement($nbGroupeTypeCoursHasCour)) {
            // set the owning side to null (unless already changed)
            if ($nbGroupeTypeCoursHasCour->getNbGroupeTypeCours() === $this) {
                $nbGroupeTypeCoursHasCour->setNbGroupeTypeCours(null);
            }
        }

        return $this;
    }

}
