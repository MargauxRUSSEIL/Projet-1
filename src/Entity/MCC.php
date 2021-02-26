<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MCCRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MCCRepository::class)
 */
class MCC
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
    private $departement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $site;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mention;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $annee;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $niveau;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contact;

    /**
     * @ORM\OneToMany(targetEntity=UE::class, mappedBy="mCC")
     */
    private $UE;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeDiplome;

    /**
     * @ORM\OneToOne(targetEntity=Parcours::class, inversedBy="mCC", cascade={"persist", "remove"})
     */
    private $parcours;

    public function __construct()
    {
        $this->UE = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(?string $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getSite(): ?string
    {
        return $this->site;
    }

    public function setSite(?string $site): self
    {
        $this->site = $site;

        return $this;
    }

    public function getMention(): ?string
    {
        return $this->mention;
    }

    public function setMention(?string $mention): self
    {
        $this->mention = $mention;

        return $this;
    }

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->annee;
    }

    public function setAnnee(?\DateTimeInterface $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(?string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return Collection|UE[]
     */
    public function getUE(): Collection
    {
        return $this->UE;
    }

    public function addUE(UE $uE): self
    {
        if (!$this->UE->contains($uE)) {
            $this->UE[] = $uE;
            $uE->setMCC($this);
        }

        return $this;
    }

    public function removeUE(UE $uE): self
    {
        if ($this->UE->removeElement($uE)) {
            // set the owning side to null (unless already changed)
            if ($uE->getMCC() === $this) {
                $uE->setMCC(null);
            }
        }

        return $this;
    }

    public function getTypeDiplome(): ?string
    {
        return $this->typeDiplome;
    }

    public function setTypeDiplome(?string $typeDiplome): self
    {
        $this->typeDiplome = $typeDiplome;

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
