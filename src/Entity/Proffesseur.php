<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProffesseurRepository")
 */
class Proffesseur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sexe", inversedBy="proffesseurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sexe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Civilite", inversedBy="proffesseurs")
     */
    private $civilite;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MatiereCour", mappedBy="proffesseur")
     */
    private $matiereCours;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Examin", mappedBy="proffesseur")
     */
    private $examins;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NoteExaminEleve", mappedBy="proffesseur")
     */
    private $noteExaminEleves;

    public function __construct()
    {
        $this->matiereCours = new ArrayCollection();
        $this->examins = new ArrayCollection();
        $this->noteExaminEleves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getSexe(): ?Sexe
    {
        return $this->sexe;
    }

    public function setSexe(?Sexe $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getCivilite(): ?Civilite
    {
        return $this->civilite;
    }

    public function setCivilite(?Civilite $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|MatiereCour[]
     */
    public function getMatiereCours(): Collection
    {
        return $this->matiereCours;
    }

    public function addMatiereCour(MatiereCour $matiereCour): self
    {
        if (!$this->matiereCours->contains($matiereCour)) {
            $this->matiereCours[] = $matiereCour;
            $matiereCour->setProffesseur($this);
        }

        return $this;
    }

    public function removeMatiereCour(MatiereCour $matiereCour): self
    {
        if ($this->matiereCours->contains($matiereCour)) {
            $this->matiereCours->removeElement($matiereCour);
            // set the owning side to null (unless already changed)
            if ($matiereCour->getProffesseur() === $this) {
                $matiereCour->setProffesseur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Examin[]
     */
    public function getExamins(): Collection
    {
        return $this->examins;
    }

    public function addExamin(Examin $examin): self
    {
        if (!$this->examins->contains($examin)) {
            $this->examins[] = $examin;
            $examin->setProffesseur($this);
        }

        return $this;
    }

    public function removeExamin(Examin $examin): self
    {
        if ($this->examins->contains($examin)) {
            $this->examins->removeElement($examin);
            // set the owning side to null (unless already changed)
            if ($examin->getProffesseur() === $this) {
                $examin->setProffesseur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|NoteExaminEleve[]
     */
    public function getNoteExaminEleves(): Collection
    {
        return $this->noteExaminEleves;
    }

    public function addNoteExaminElefe(NoteExaminEleve $noteExaminElefe): self
    {
        if (!$this->noteExaminEleves->contains($noteExaminElefe)) {
            $this->noteExaminEleves[] = $noteExaminElefe;
            $noteExaminElefe->setProffesseur($this);
        }

        return $this;
    }

    public function removeNoteExaminElefe(NoteExaminEleve $noteExaminElefe): self
    {
        if ($this->noteExaminEleves->contains($noteExaminElefe)) {
            $this->noteExaminEleves->removeElement($noteExaminElefe);
            // set the owning side to null (unless already changed)
            if ($noteExaminElefe->getProffesseur() === $this) {
                $noteExaminElefe->setProffesseur(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }

}
