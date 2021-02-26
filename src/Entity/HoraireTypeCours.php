<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\HoraireTypeCoursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=HoraireTypeCoursRepository::class)
 */
class HoraireTypeCours
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
    private $horaireCM;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $horaireTP;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $horaireTD;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $horaireAutre;

    /**
     * @ORM\ManyToOne(targetEntity=NbGroupeTypeCoursHasCours::class, inversedBy="horaireTypeCours")
     */
    private $nbGroupeTypeCoursHasCours;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHoraireCM(): ?string
    {
        return $this->horaireCM;
    }

    public function setHoraireCM(?string $horaireCM): self
    {
        $this->horaireCM = $horaireCM;

        return $this;
    }

    public function getHoraireTP(): ?string
    {
        return $this->horaireTP;
    }

    public function setHoraireTP(?string $horaireTP): self
    {
        $this->horaireTP = $horaireTP;

        return $this;
    }

    public function getHoraireTD(): ?string
    {
        return $this->horaireTD;
    }

    public function setHoraireTD(?string $horaireTD): self
    {
        $this->horaireTD = $horaireTD;

        return $this;
    }

    public function getHoraireAutre(): ?string
    {
        return $this->horaireAutre;
    }

    public function setHoraireAutre(?string $horaireAutre): self
    {
        $this->horaireAutre = $horaireAutre;

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
