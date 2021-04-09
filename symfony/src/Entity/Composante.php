<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ComposanteRepository;
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
     * @ORM\ManyToOne(targetEntity=Formation::class, inversedBy="composante")
     */
    private $formation;

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

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }
}
