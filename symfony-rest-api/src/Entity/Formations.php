<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FormationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=FormationsRepository::class)
 */
class Formations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Lieux;

    /**
     * @ORM\Column(type="integer")
     */
    private $Departement;

    /**
     * @ORM\Column(type="date")
     */
    private $Date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_formation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $update_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveau_formation;

    /**
     * @ORM\Column(type="integer")
     */
    private $durée_formation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLieux(): ?string
    {
        return $this->Lieux;
    }

    public function setLieux(string $Lieux): self
    {
        $this->Lieux = $Lieux;

        return $this;
    }

    public function getDepartement(): ?int
    {
        return $this->Departement;
    }

    public function setDepartement(int $Departement): self
    {
        $this->Departement = $Departement;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getTypeFormation(): ?string
    {
        return $this->type_formation;
    }

    public function setTypeFormation(string $type_formation): self
    {
        $this->type_formation = $type_formation;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->update_at;
    }

    public function setUpdateAt(\DateTimeInterface $update_at): self
    {
        $this->update_at = $update_at;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getNiveauFormation(): ?string
    {
        return $this->niveau_formation;
    }

    public function setNiveauFormation(string $niveau_formation): self
    {
        $this->niveau_formation = $niveau_formation;

        return $this;
    }

    public function getDuréeFormation(): ?int
    {
        return $this->durée_formation;
    }

    public function setDuréeFormation(int $durée_formation): self
    {
        $this->durée_formation = $durée_formation;

        return $this;
    }
}
