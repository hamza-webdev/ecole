<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EleveRepository")
 */
class Eleve
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
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sexe", inversedBy="eleves")
     */
    private $sexe;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="eleve")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NoteExaminEleve", mappedBy="eleve")
     */
    private $noteExaminEleves;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ParentPereMere", inversedBy="eleves")
     */
    private $parent_p1_p2;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Classeroom", inversedBy="eleves")
     */
    private $classeroom;

    public function __construct()
    {
        $this->noteExaminEleves = new ArrayCollection();
//        $this->classeroom = new ArrayCollection();
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

    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

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
            $noteExaminElefe->setEleve($this);
        }

        return $this;
    }

    public function removeNoteExaminElefe(NoteExaminEleve $noteExaminElefe): self
    {
        if ($this->noteExaminEleves->contains($noteExaminElefe)) {
            $this->noteExaminEleves->removeElement($noteExaminElefe);
            // set the owning side to null (unless already changed)
            if ($noteExaminElefe->getEleve() === $this) {
                $noteExaminElefe->setEleve(null);
            }
        }

        return $this;
    }

//    public function addClasseroom(Classeroom $classerooms): self
////    {
////        if (!$this->classeroom->contains($classerooms)) {
////            $this->classeroom[] = $classerooms;
////            $classerooms->setEleve($this);
////        }
//
//        return $this;
//    }

    public function getParentP1P2(): ?ParentPereMere
    {
        return $this->parent_p1_p2;
    }

    public function setParentP1P2(?ParentPereMere $parent_p1_p2): self
    {
        $this->parent_p1_p2 = $parent_p1_p2;

        return $this;
    }

    public function getClasseroom(): ?Classeroom
    {
        return $this->classeroom;
    }

    /**
     * @param Classeroom|null $classeroom
     * @return $this
     */
    public function setClasseroom(?Classeroom $classeroom): self
    {
        $this->classeroom = $classeroom;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
