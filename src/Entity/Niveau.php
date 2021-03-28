<?php

namespace App\Entity;

use App\Repository\NiveauRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NiveauRepository::class)
 */
class Niveau
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
    private $libelleNiveau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleNiveau(): ?string
    {
        return $this->libelleNiveau;
    }

    public function setLibelleNiveau(?string $libelleNiveau): self
    {
        $this->libelleNiveau = $libelleNiveau;

        return $this;
    }
}
