<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MCCRepository;
use DateTime;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
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
     * @Groups("post:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $departement;

    /**
     * @ORM\Column(type="datetime")
     */
    private $annee;

    /**
     * @ORM\OneToOne(targetEntity=Parcours::class, inversedBy="mCC", cascade={"persist", "remove"})
     */
    private $parcours;

    /**
     * @ORM\ManyToOne(targetEntity=Mention::class, inversedBy="mccs")
     */
    private $mention;

    /**
     * @ORM\ManyToMany(targetEntity=UE::class, inversedBy="mCCs")
     */
    private $ue;

    /**
     * @ORM\ManyToOne(targetEntity=Formation::class, inversedBy="mccs")
     */
    private $formation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveau;

    public function __construct()
    {
        //$this->UE = new ArrayCollection();
        $this->ue = new ArrayCollection();
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

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->annee;
    }

    public function setAnnee(?\DateTimeInterface $annee): self
    {
        $this->annee = $annee;

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

    public function getMention(): ?Mention
    {
        return $this->mention;
    }

    public function setMention(?Mention $mention): self
    {
        $this->mention = $mention;

        return $this;
    }

    /**
     * @return Collection|UE[]
     */
    public function getUe(): Collection
    {
        return $this->ue;
    }

    public function addUe(UE $ue): self
    {
        if (!$this->ue->contains($ue)) {
            $this->ue[] = $ue;
        }

        return $this;
    }

    public function removeUe(UE $ue): self
    {
        $this->ue->removeElement($ue);

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

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

}
