<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatiereCourRepository")
 */
class MatiereCour
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
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Matiere", inversedBy="matiereCours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matiere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Classeroom", inversedBy="matiereCours")
     */
    private $classeroom;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Proffesseur", inversedBy="matiereCours")
     */
    private $proffesseur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Examin", mappedBy="matiere_cour")
     */
    private $examins;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NoteExaminEleve", mappedBy="matiere_cour")
     */
    private $noteExaminEleves;

    public function __construct()
    {
        $this->classeroom = new ArrayCollection();
        $this->examins = new ArrayCollection();
        $this->noteExaminEleves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getMatiere(): ?Matiere
    {
        return $this->matiere;
    }

    public function setMatiere(?Matiere $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Classeroom[]
     */
    public function getClasseroom(): Collection
    {
        return $this->classeroom;
    }

    public function addClasseroom(Classeroom $classeroom): self
    {
        if (!$this->classeroom->contains($classeroom)) {
            $this->classeroom[] = $classeroom;
        }

        return $this;
    }

    public function removeClasseroom(Classeroom $classeroom): self
    {
        if ($this->classeroom->contains($classeroom)) {
            $this->classeroom->removeElement($classeroom);
        }

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getProffesseur(): ?Proffesseur
    {
        return $this->proffesseur;
    }

    public function setProffesseur(?Proffesseur $proffesseur): self
    {
        $this->proffesseur = $proffesseur;

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
            $examin->setMatiereCour($this);
        }

        return $this;
    }

    public function removeExamin(Examin $examin): self
    {
        if ($this->examins->contains($examin)) {
            $this->examins->removeElement($examin);
            // set the owning side to null (unless already changed)
            if ($examin->getMatiereCour() === $this) {
                $examin->setMatiereCour(null);
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
            $noteExaminElefe->setMatiereCour($this);
        }

        return $this;
    }

    public function removeNoteExaminElefe(NoteExaminEleve $noteExaminElefe): self
    {
        if ($this->noteExaminEleves->contains($noteExaminElefe)) {
            $this->noteExaminEleves->removeElement($noteExaminElefe);
            // set the owning side to null (unless already changed)
            if ($noteExaminElefe->getMatiereCour() === $this) {
                $noteExaminElefe->setMatiereCour(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}
