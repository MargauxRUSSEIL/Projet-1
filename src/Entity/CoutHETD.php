<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CoutHETDRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CoutHETDRepository::class)
 */
class CoutHETD
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
    private $coutCM;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coutTP;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coutTD;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coutHETDcol;

    /**
     * @ORM\OneToMany(targetEntity=NbGroupeTypeCoursHasCours::class, mappedBy="coutHETD", cascade={"persist", "remove"})
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

    public function getCoutCM(): ?string
    {
        return $this->coutCM;
    }

    public function setCoutCM(?string $coutCM): self
    {
        $this->coutCM = $coutCM;

        return $this;
    }

    public function getCoutTP(): ?string
    {
        return $this->coutTP;
    }

    public function setCoutTP(?string $coutTP): self
    {
        $this->coutTP = $coutTP;

        return $this;
    }

    public function getCoutTD(): ?string
    {
        return $this->coutTD;
    }

    public function setCoutTD(?string $coutTD): self
    {
        $this->coutTD = $coutTD;

        return $this;
    }

    public function getCoutHETDcol(): ?string
    {
        return $this->coutHETDcol;
    }

    public function setCoutHETDcol(?string $coutHETDcol): self
    {
        $this->coutHETDcol = $coutHETDcol;

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
            $nbGroupeTypeCoursHasCour->setCoutHETD($this);
        }

        return $this;
    }

    public function removeNbGroupeTypeCoursHasCour(NbGroupeTypeCoursHasCours $nbGroupeTypeCoursHasCour): self
    {
        if ($this->nbGroupeTypeCoursHasCours->removeElement($nbGroupeTypeCoursHasCour)) {
            // set the owning side to null (unless already changed)
            if ($nbGroupeTypeCoursHasCour->getCoutHETD() === $this) {
                $nbGroupeTypeCoursHasCour->setCoutHETD(null);
            }
        }

        return $this;
    }

}
