<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\HoraireTypeCoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity=NbGroupeTypeCoursHasCours::class, mappedBy="horaireTypeCours", cascade={"persist", "remove"})
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
            $nbGroupeTypeCoursHasCour->setHoraireTypeCours($this);
        }

        return $this;
    }

    public function removeNbGroupeTypeCoursHasCour(NbGroupeTypeCoursHasCours $nbGroupeTypeCoursHasCour): self
    {
        if ($this->nbGroupeTypeCoursHasCours->removeElement($nbGroupeTypeCoursHasCour)) {
            // set the owning side to null (unless already changed)
            if ($nbGroupeTypeCoursHasCour->getHoraireTypeCours() === $this) {
                $nbGroupeTypeCoursHasCour->setHoraireTypeCours(null);
            }
        }

        return $this;
    }

}
