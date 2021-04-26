<?php

namespace App\Entity;

use App\Repository\ModaliteRecrutementRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ModaliteRecrutementRepository::class)
 */
class ModaliteRecrutement
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
     * @ORM\OneToMany(targetEntity=Creationformation::class, mappedBy="modaliteRecrutement", cascade={"persist", "remove"})
     */
    private $creationformations;

    public function __construct()
    {
        $this->creationformations = new ArrayCollection();
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
     * @return Collection|Creationformation[]
     */
    public function getCreationformations(): Collection
    {
        return $this->creationformations;
    }

    public function addCreationformation(Creationformation $creationformation): self
    {
        if (!$this->creationformations->contains($creationformation)) {
            $this->creationformations[] = $creationformation;
            $creationformation->setModaliteRecrutement($this);
        }

        return $this;
    }

    public function removeCreationformation(Creationformation $creationformation): self
    {
        if ($this->creationformations->removeElement($creationformation)) {
            // set the owning side to null (unless already changed)
            if ($creationformation->getModaliteRecrutement() === $this) {
                $creationformation->setModaliteRecrutement(null);
            }
        }

        return $this;
    }
}
