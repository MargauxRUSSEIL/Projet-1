<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TypeControleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TypeControleRepository::class)
 */
class TypeControle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Cours::class, inversedBy="typeControle")
     */
    private $cours;

    /**
     * @ORM\ManyToOne(targetEntity=SessionUniqueHasTypeControle::class, inversedBy="typeControle")
     */
    private $sessionUniqueHasTypeControle;

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

    public function getSessionUniqueHasTypeControle(): ?SessionUniqueHasTypeControle
    {
        return $this->sessionUniqueHasTypeControle;
    }

    public function setSessionUniqueHasTypeControle(?SessionUniqueHasTypeControle $sessionUniqueHasTypeControle): self
    {
        $this->sessionUniqueHasTypeControle = $sessionUniqueHasTypeControle;

        return $this;
    }
}
