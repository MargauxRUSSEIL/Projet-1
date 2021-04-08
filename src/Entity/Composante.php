<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ComposanteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ComposanteRepository::class)
 */
class Composante
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
    private $libelleInstitut;

    /**
     * @ORM\OneToMany(targetEntity=Formation::class, mappedBy="composante", cascade={"persist", "remove"})
     *     
     */
    private $formation;

    public function __construct()
    {
        $this->formation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleInstitut(): ?string
    {
        return $this->libelleInstitut;
    }

    public function setLibelleInstitut(?string $libelleInstitut): self
    {
        $this->libelleInstitut = $libelleInstitut;

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getFormation(): Collection
    {
        return $this->formation;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formation->contains($formation)) {
            $this->formation[] = $formation;
            $formation->setComposante($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formation->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getComposante() === $this) {
                $formation->setComposante(null);
            }
        }

        return $this;
    }

}
