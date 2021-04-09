<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TypeDiplomeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TypeDiplomeRepository::class)
 */
class TypeDiplome
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Formation::class, inversedBy="typeDiplome")
     */
    private $formation;

    /**
     * @ORM\ManyToOne(targetEntity=TypeDiplomeHasDiplomeEtablissement::class, inversedBy="typeDiplome")
     */
    private $typeDiplomeHasDiplomeEtablissement;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTypeDiplomeHasDiplomeEtablissement(): ?TypeDiplomeHasDiplomeEtablissement
    {
        return $this->typeDiplomeHasDiplomeEtablissement;
    }

    public function setTypeDiplomeHasDiplomeEtablissement(?TypeDiplomeHasDiplomeEtablissement $typeDiplomeHasDiplomeEtablissement): self
    {
        $this->typeDiplomeHasDiplomeEtablissement = $typeDiplomeHasDiplomeEtablissement;

        return $this;
    }

}
