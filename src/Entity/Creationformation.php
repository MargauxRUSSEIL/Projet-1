<?php

namespace App\Entity;

use App\Repository\CreationformationRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CreationformationRepository::class)
 */
class Creationformation
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
    private $niveau_requis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nb_etudiants;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_ouverture;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $organisation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $competences;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $motivation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $points_spe;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $public;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $insertion_pro;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $concurrence;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $partenaires_historique;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $diversification_peda;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $service_diversification;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $mutualisation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $recherche;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $equipements;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $strategie;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $actions;

    /**
     * @ORM\ManyToMany(targetEntity=Partenaire::class, inversedBy="creationformations")
     */
    private $partenaire;

    /**
     * @ORM\OneToOne(targetEntity=Formation::class, inversedBy="creationformation", cascade={"persist", "remove"})
     */
    private $formation;

    /**
     * @ORM\ManyToOne(targetEntity=ModaliteFormation::class, inversedBy="creationformations")
     */
    private $modaliteFormation;

    /**
     * @ORM\ManyToOne(targetEntity=ModalitePedagogique::class, inversedBy="creationformations")
     */
    private $modalitePedagogique;

    /**
     * @ORM\ManyToOne(targetEntity=ModaliteRecrutement::class, inversedBy="creationformations")
     */
    private $modaliteRecrutement;

    public function __construct()
    {
        $this->partenaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveauRequis(): ?string
    {
        return $this->niveau_requis;
    }

    public function setNiveauRequis(?string $niveau_requis): self
    {
        $this->niveau_requis = $niveau_requis;

        return $this;
    }

    public function getNbEtudiants(): ?string
    {
        return $this->nb_etudiants;
    }

    public function setNbEtudiants(?string $nb_etudiants): self
    {
        $this->nb_etudiants = $nb_etudiants;

        return $this;
    }

    public function getDateOuverture(): ?\DateTimeInterface
    {
        return $this->date_ouverture;
    }

    public function setDateOuverture(?\DateTimeInterface $date_ouverture): self
    {
        $this->date_ouverture = $date_ouverture;

        return $this;
    }

    public function getOrganisation(): ?string
    {
        return $this->organisation;
    }

    public function setOrganisation(?string $organisation): self
    {
        $this->organisation = $organisation;

        return $this;
    }

    public function getCompetences(): ?string
    {
        return $this->competences;
    }

    public function setCompetences(?string $competences): self
    {
        $this->competences = $competences;

        return $this;
    }

    public function getMotivation(): ?string
    {
        return $this->motivation;
    }

    public function setMotivation(?string $motivation): self
    {
        $this->motivation = $motivation;

        return $this;
    }

    public function getPointsSpe(): ?string
    {
        return $this->points_spe;
    }

    public function setPointsSpe(?string $points_spe): self
    {
        $this->points_spe = $points_spe;

        return $this;
    }

    public function getPublic(): ?string
    {
        return $this->public;
    }

    public function setPublic(?string $public): self
    {
        $this->public = $public;

        return $this;
    }

    public function getInsertionPro(): ?string
    {
        return $this->insertion_pro;
    }

    public function setInsertionPro(?string $insertion_pro): self
    {
        $this->insertion_pro = $insertion_pro;

        return $this;
    }

    public function getConcurrence(): ?string
    {
        return $this->concurrence;
    }

    public function setConcurrence(?string $concurrence): self
    {
        $this->concurrence = $concurrence;

        return $this;
    }

    public function getPartenairesHistorique(): ?string
    {
        return $this->partenaires_historique;
    }

    public function setPartenairesHistorique(?string $partenaires_historique): self
    {
        $this->partenaires_historique = $partenaires_historique;

        return $this;
    }

    public function getDiversificationPeda(): ?string
    {
        return $this->diversification_peda;
    }

    public function setDiversificationPeda(?string $diversification_peda): self
    {
        $this->diversification_peda = $diversification_peda;

        return $this;
    }

    public function getServiceDiversification(): ?bool
    {
        return $this->service_diversification;
    }

    public function setServiceDiversification(?bool $service_diversification): self
    {
        $this->service_diversification = $service_diversification;

        return $this;
    }

    public function getMutualisation(): ?string
    {
        return $this->mutualisation;
    }

    public function setMutualisation(?string $mutualisation): self
    {
        $this->mutualisation = $mutualisation;

        return $this;
    }

    public function getRecherche(): ?string
    {
        return $this->recherche;
    }

    public function setRecherche(?string $recherche): self
    {
        $this->recherche = $recherche;

        return $this;
    }

    public function getEquipements(): ?string
    {
        return $this->equipements;
    }

    public function setEquipements(?string $equipements): self
    {
        $this->equipements = $equipements;

        return $this;
    }

    public function getStrategie(): ?string
    {
        return $this->strategie;
    }

    public function setStrategie(?string $strategie): self
    {
        $this->strategie = $strategie;

        return $this;
    }

    public function getActions(): ?string
    {
        return $this->actions;
    }

    public function setActions(?string $actions): self
    {
        $this->actions = $actions;

        return $this;
    }

    /**
     * @return Collection|Partenaire[]
     */
    public function getPartenaire(): Collection
    {
        return $this->partenaire;
    }

    public function addPartenaire(Partenaire $partenaire): self
    {
        if (!$this->partenaire->contains($partenaire)) {
            $this->partenaire[] = $partenaire;
        }

        return $this;
    }

    public function removePartenaire(Partenaire $partenaire): self
    {
        $this->partenaire->removeElement($partenaire);

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

    public function getModaliteFormation(): ?ModaliteFormation
    {
        return $this->modaliteFormation;
    }

    public function setModaliteFormation(?ModaliteFormation $modaliteFormation): self
    {
        $this->modaliteFormation = $modaliteFormation;

        return $this;
    }

    public function getModalitePedagogique(): ?ModalitePedagogique
    {
        return $this->modalitePedagogique;
    }

    public function setModalitePedagogique(?ModalitePedagogique $modalitePedagogique): self
    {
        $this->modalitePedagogique = $modalitePedagogique;

        return $this;
    }

    public function getModaliteRecrutement(): ?ModaliteRecrutement
    {
        return $this->modaliteRecrutement;
    }

    public function setModaliteRecrutement(?ModaliteRecrutement $modaliteRecrutement): self
    {
        $this->modaliteRecrutement = $modaliteRecrutement;

        return $this;
    }
}
