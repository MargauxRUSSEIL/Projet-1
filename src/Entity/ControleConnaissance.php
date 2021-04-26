<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ControleConnaissanceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ControleConnaissanceRepository::class)
 */
class ControleConnaissance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Cours::class, inversedBy="controleConnaissance")
     */
    private $cours;

    /**
     * @ORM\ManyToOne(targetEntity=SessionUniqueHasControleConnaissance::class, inversedBy="controleConnaissance")
     */
    private $sessionUniqueHasControleConnaissance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCours(): ?Cours
    {
        return $this->cours;
    }

    public function setCours(?Cours $cours): self
    {
        $this->cours = $cours;

        return $this;
    }

    public function getSessionUniqueHasControleConnaissance(): ?SessionUniqueHasControleConnaissance
    {
        return $this->sessionUniqueHasControleConnaissance;
    }

    public function setSessionUniqueHasControleConnaissance(?SessionUniqueHasControleConnaissance $sessionUniqueHasControleConnaissance): self
    {
        $this->sessionUniqueHasControleConnaissance = $sessionUniqueHasControleConnaissance;

        return $this;
    }
}
