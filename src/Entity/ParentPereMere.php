<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParentPereMereRepository")
 */
class ParentPereMere
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
    private $name_p1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom_p1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email_p1;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sexe", inversedBy="parentP1")
     */
    private $sexe_p1;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $telephone_p1;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Adresse", mappedBy="adresse_p1")
     */
    private $adresse_p1;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Civilite", inversedBy="civilte_p1")
     */
    private $civilite;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="parent_1", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name_p2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom_p2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email_p2;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sexe", inversedBy="parent_p2")
     */
    private $sexe_p2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephone_p2;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Adresse", inversedBy="adresse_p2", cascade={"persist", "remove"})
     */
    private $adresse_p2;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Civilite", inversedBy="parent_p2")
     */
    private $civilite_p2;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SituationFamilialle", inversedBy="parentPereMeres")
     */
    private $situation_Familiale;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Eleve", mappedBy="parent_p1_p2")
     */
    private $eleves;

    public function __construct()
    {
        $this->adresse_p1 = new ArrayCollection();
        $this->eleves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameP1(): ?string
    {
        return $this->name_p1;
    }

    public function setNameP1(string $name_p1): self
    {
        $this->name_p1 = $name_p1;

        return $this;
    }

    public function getPrenomP1(): ?string
    {
        return $this->prenom_p1;
    }

    public function setPrenomP1(?string $prenom_p1): self
    {
        $this->prenom_p1 = $prenom_p1;

        return $this;
    }

    public function getEmailP1(): ?string
    {
        return $this->email_p1;
    }

    public function setEmailP1(?string $email_p1): self
    {
        $this->email_p1 = $email_p1;

        return $this;
    }

    public function getSexeP1(): ?Sexe
    {
        return $this->sexe_p1;
    }

    public function setSexeP1(?Sexe $sexe_p1): self
    {
        $this->sexe_p1 = $sexe_p1;

        return $this;
    }

    public function getTelephoneP1(): ?string
    {
        return $this->telephone_p1;
    }

    public function setTelephoneP1(?string $telephone_p1): self
    {
        $this->telephone_p1 = $telephone_p1;

        return $this;
    }

    /**
     * @return Collection|Adresse[]
     */
    public function getAdresseP1(): Collection
    {
        return $this->adresse_p1;
    }

    public function addAdresseP1(Adresse $adresseP1): self
    {
        if (!$this->adresse_p1->contains($adresseP1)) {
            $this->adresse_p1[] = $adresseP1;
            $adresseP1->setAdresseP1($this);
        }

        return $this;
    }

    public function removeAdresseP1(Adresse $adresseP1): self
    {
        if ($this->adresse_p1->contains($adresseP1)) {
            $this->adresse_p1->removeElement($adresseP1);
            // set the owning side to null (unless already changed)
            if ($adresseP1->getAdresseP1() === $this) {
                $adresseP1->setAdresseP1(null);
            }
        }

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

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getNameP2(): ?string
    {
        return $this->name_p2;
    }

    public function setNameP2(?string $name_p2): self
    {
        $this->name_p2 = $name_p2;

        return $this;
    }

    public function getPrenomP2(): ?string
    {
        return $this->prenom_p2;
    }

    public function setPrenomP2(?string $prenom_p2): self
    {
        $this->prenom_p2 = $prenom_p2;

        return $this;
    }

    public function getEmailP2(): ?string
    {
        return $this->email_p2;
    }

    public function setEmailP2(?string $email_p2): self
    {
        $this->email_p2 = $email_p2;

        return $this;
    }

    public function getSexeP2(): ?Sexe
    {
        return $this->sexe_p2;
    }

    public function setSexeP2(?Sexe $sexe_p2): self
    {
        $this->sexe_p2 = $sexe_p2;

        return $this;
    }

    public function getTelephoneP2(): ?string
    {
        return $this->telephone_p2;
    }

    public function setTelephoneP2(?string $telephone_p2): self
    {
        $this->telephone_p2 = $telephone_p2;

        return $this;
    }

    public function getAdresseP2(): ?Adresse
    {
        return $this->adresse_p2;
    }

    public function setAdresseP2(?Adresse $adresse_p2): self
    {
        $this->adresse_p2 = $adresse_p2;

        return $this;
    }

    public function getCiviliteP2(): ?Civilite
    {
        return $this->civilite_p2;
    }

    public function setCiviliteP2(?Civilite $civilite_p2): self
    {
        $this->civilite_p2 = $civilite_p2;

        return $this;
    }

    public function getSituationFamiliale(): ?SituationFamilialle
    {
        return $this->situation_Familiale;
    }

    public function setSituationFamiliale(?SituationFamilialle $situation_Familiale): self
    {
        $this->situation_Familiale = $situation_Familiale;

        return $this;
    }

    /**
     * @return Collection|Eleve[]
     */
    public function getEleves(): Collection
    {
        return $this->eleves;
    }

    public function addElefe(Eleve $elefe): self
    {
        if (!$this->eleves->contains($elefe)) {
            $this->eleves[] = $elefe;
            $elefe->setParentP1P2($this);
        }

        return $this;
    }

    public function removeElefe(Eleve $elefe): self
    {
        if ($this->eleves->contains($elefe)) {
            $this->eleves->removeElement($elefe);
            // set the owning side to null (unless already changed)
            if ($elefe->getParentP1P2() === $this) {
                $elefe->setParentP1P2(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getNameP1();
    }
}
