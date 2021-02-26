<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CoutHETDRepository;
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
     * @ORM\ManyToOne(targetEntity=NbGroupeTypeCoursHasCours::class, inversedBy="coutHETD")
     */
    private $nbGroupeTypeCoursHasCours;

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

    public function getNbGroupeTypeCoursHasCours(): ?NbGroupeTypeCoursHasCours
    {
        return $this->nbGroupeTypeCoursHasCours;
    }

    public function setNbGroupeTypeCoursHasCours(?NbGroupeTypeCoursHasCours $nbGroupeTypeCoursHasCours): self
    {
        $this->nbGroupeTypeCoursHasCours = $nbGroupeTypeCoursHasCours;

        return $this;
    }
}
