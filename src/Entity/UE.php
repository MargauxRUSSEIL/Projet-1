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
     * @ORM\ManyToMany(targetEntity=Cours::class, inversedBy="uEs", cascade={"persist", "remove"})
     */
    private $cours;

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
        }

        return $this;
    }

    public function removeCour(Cours $cour): self
    {
        $this->cours->removeElement($cour);

        return $this;
    }
}
