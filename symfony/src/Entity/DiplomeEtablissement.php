<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DiplomeEtablissementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=DiplomeEtablissementRepository::class)
 */
class DiplomeEtablissement
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
    private $libelleDiplome;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nbAnneeDiplome;

    /**
     * @ORM\ManyToOne(targetEntity=TypeDiplomeHasDiplomeEtablissement::class, inversedBy="diplomeEtablissement")
     */
    private $typeDiplomeHasDiplomeEtablissement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleDiplome(): ?string
    {
        return $this->libelleDiplome;
    }

    public function setLibelleDiplome(?string $libelleDiplome): self
    {
        $this->libelleDiplome = $libelleDiplome;

        return $this;
    }

    public function getNbAnneeDiplome(): ?string
    {
        return $this->nbAnneeDiplome;
    }

    public function setNbAnneeDiplome(?string $nbAnneeDiplome): self
    {
        $this->nbAnneeDiplome = $nbAnneeDiplome;

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
