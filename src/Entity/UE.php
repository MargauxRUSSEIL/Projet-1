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
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity=Cours::class, inversedBy="uEs", cascade={"persist", "remove"})
     */
    private $cours;

    /**
     * @ORM\ManyToMany(targetEntity=MCC::class, mappedBy="ue")
     */
    private $mCCs;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
        $this->mCCs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

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

    /**
     * @return Collection|MCC[]
     */
    public function getMCCs(): Collection
    {
        return $this->mCCs;
    }

    public function addMCC(MCC $mCC): self
    {
        if (!$this->mCCs->contains($mCC)) {
            $this->mCCs[] = $mCC;
            $mCC->addUe($this);
        }

        return $this;
    }

    public function removeMCC(MCC $mCC): self
    {
        if ($this->mCCs->removeElement($mCC)) {
            $mCC->removeUe($this);
        }

        return $this;
    }
}
