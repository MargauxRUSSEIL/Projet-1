<?php

namespace App\Entity;

use App\Repository\MentionRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity=TypeDiplome::class, mappedBy="mentions")
     */
    private $typeDiplomes;

    /**
     * @ORM\OneToMany(targetEntity=Formation::class, mappedBy="mention", cascade={"persist", "remove"})
     */
    private $formations;

    /**
     * @ORM\ManyToOne(targetEntity=Domaine::class, inversedBy="mentions")
     */
    private $domaine;

    /**
     * @ORM\OneToMany(targetEntity=MCC::class, mappedBy="mention", cascade={"persist", "remove"})
     */
    private $mccs;

    /**
     * @ORM\OneToMany(targetEntity=Semestre::class, mappedBy="mention", cascade={"persist", "remove"})
     */
    private $semestres;

    public function __construct()
    {
        $this->typeDiplomes = new ArrayCollection();
        $this->formations = new ArrayCollection();
        $this->mccs = new ArrayCollection();
        $this->semestres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|TypeDiplome[]
     */
    public function getTypeDiplomes(): Collection
    {
        return $this->typeDiplomes;
    }

    public function addTypeDiplome(TypeDiplome $typeDiplome): self
    {
        if (!$this->typeDiplomes->contains($typeDiplome)) {
            $this->typeDiplomes[] = $typeDiplome;
            $typeDiplome->addMention($this);
        }

        return $this;
    }

    public function removeTypeDiplome(TypeDiplome $typeDiplome): self
    {
        if ($this->typeDiplomes->removeElement($typeDiplome)) {
            $typeDiplome->removeMention($this);
        }

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->setMention($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formations->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getMention() === $this) {
                $formation->setMention(null);
            }
        }

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

    /**
     * @return Collection|MCC[]
     */
    public function getMccs(): Collection
    {
        return $this->mccs;
    }

    public function addMcc(MCC $mcc): self
    {
        if (!$this->mccs->contains($mcc)) {
            $this->mccs[] = $mcc;
            $mcc->setMention($this);
        }

        return $this;
    }

    public function removeMcc(MCC $mcc): self
    {
        if ($this->mccs->removeElement($mcc)) {
            // set the owning side to null (unless already changed)
            if ($mcc->getMention() === $this) {
                $mcc->setMention(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Semestre[]
     */
    public function getSemestres(): Collection
    {
        return $this->semestres;
    }

    public function addSemestre(Semestre $semestre): self
    {
        if (!$this->semestres->contains($semestre)) {
            $this->semestres[] = $semestre;
            $semestre->setMention($this);
        }

        return $this;
    }

    public function removeSemestre(Semestre $semestre): self
    {
        if ($this->semestres->removeElement($semestre)) {
            // set the owning side to null (unless already changed)
            if ($semestre->getMention() === $this) {
                $semestre->setMention(null);
            }
        }

        return $this;
    }
}
