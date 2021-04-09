<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CoursRepository::class)
 */
class Cours
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
    private $libelleCours;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codeAPOGEE;

    /**
     * @ORM\ManyToOne(targetEntity=NbGroupeTypeCoursHasCours::class, inversedBy="cours")
     */
    private $nbGroupeTypeCoursHasCours;

    /**
     * @ORM\ManyToMany(targetEntity=UE::class, mappedBy="cours")
     */
    private $uEs;

    /**
     * @ORM\OneToMany(targetEntity=TypeControle::class, mappedBy="cours")
     */
    private $typeControle;

    public function __construct()
    {
        $this->uEs = new ArrayCollection();
        $this->typeControle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleCours(): ?string
    {
        return $this->libelleCours;
    }

    public function setLibelleCours(?string $libelleCours): self
    {
        $this->libelleCours = $libelleCours;

        return $this;
    }

    public function getCodeAPOGEE(): ?string
    {
        return $this->codeAPOGEE;
    }

    public function setCodeAPOGEE(?string $codeAPOGEE): self
    {
        $this->codeAPOGEE = $codeAPOGEE;

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

    /**
     * @return Collection|UE[]
     */
    public function getUEs(): Collection
    {
        return $this->uEs;
    }

    public function addUE(UE $uE): self
    {
        if (!$this->uEs->contains($uE)) {
            $this->uEs[] = $uE;
            $uE->addCour($this);
        }

        return $this;
    }

    public function removeUE(UE $uE): self
    {
        if ($this->uEs->removeElement($uE)) {
            $uE->removeCour($this);
        }

        return $this;
    }

     /**
     * @return Collection|TypeControle[]
     */
    public function getTypeControle(): Collection
    {
        return $this->typeControle;
    }

    public function addTypeControle(TypeControle $typeControle): self
    {
        if (!$this->typeControle->contains($typeControle)) {
            $this->typeControle[] = $typeControle;
            $typeControle->setCours($this);
        }

        return $this;
    }

    public function removeTypeControle(TypeControle $typeControle): self
    {
        if ($this->typeControle->removeElement($typeControle)) {
            // set the owning side to null (unless already changed)
            if ($typeControle->getCours() === $this) {
                $typeControle->setCours(null);
            }
        }

        return $this;
    }

}
