<?php

namespace App\Entity;

use App\Repository\MentionRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MentionRepository::class)
 */
class Mention
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
    private $libelleMention;

    /**
     * @ORM\ManyToOne(targetEntity=Domaine::class, inversedBy="mentions")
     */
    private $domaine;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleMention(): ?string
    {
        return $this->libelleMention;
    }

    public function setLibelleMention(?string $libelleMention): self
    {
        $this->libelleMention = $libelleMention;

        return $this;
    }

    public function getDomaine(): ?Domaine
    {
        return $this->domaine;
    }

    public function setDomaine(?Domaine $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }
}
