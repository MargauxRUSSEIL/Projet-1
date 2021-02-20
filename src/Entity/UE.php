<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UERepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=UERepository::class)
 */
class UE
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
    private $libelleUE;

    /**
     * @ORM\ManyToOne(targetEntity=MCC::class, inversedBy="UE")
     */
    private $mCC;

    /**
     * @ORM\OneToMany(targetEntity=Cours::class, mappedBy="uE")
     */
    private $cours;

    /**
     * @ORM\ManyToOne(targetEntity=Parcours::class, inversedBy="UE")
     */
    private $parcours;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleUE(): ?string
    {
        return $this->libelleUE;
    }

    public function setLibelleUE(?string $libelleUE): self
    {
        $this->libelleUE = $libelleUE;

        return $this;
    }

    public function getMCC(): ?MCC
    {
        return $this->mCC;
    }

    public function setMCC(?MCC $mCC): self
    {
        $this->mCC = $mCC;

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
            $cour->setUE($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): self
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getUE() === $this) {
                $cour->setUE(null);
            }
        }

        return $this;
    }

    public function getParcours(): ?Parcours
    {
        return $this->parcours;
    }

    public function setParcours(?Parcours $parcours): self
    {
        $this->parcours = $parcours;

        return $this;
    }
}
