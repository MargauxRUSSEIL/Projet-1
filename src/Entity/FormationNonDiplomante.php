<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FormationNonDiplomanteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=FormationNonDiplomanteRepository::class)
 */
class FormationNonDiplomante
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
    private $libelleCertificat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nbAnneeFormation;

    /**
     * @ORM\ManyToOne(targetEntity=TypeDiplomeHasDiplomeEtablissement::class, inversedBy="formationNonDiplomante")
     */
    private $typeDiplomeHasDiplomeEtablissement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleCertificat(): ?string
    {
        return $this->libelleCertificat;
    }

    public function setLibelleCertificat(?string $libelleCertificat): self
    {
        $this->libelleCertificat = $libelleCertificat;

        return $this;
    }

    public function getNbAnneeFormation(): ?string
    {
        return $this->nbAnneeFormation;
    }

    public function setNbAnneeFormation(?string $nbAnneeFormation): self
    {
        $this->nbAnneeFormation = $nbAnneeFormation;

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
