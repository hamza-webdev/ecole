<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExaminRepository")
 */
class Examin
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MatiereCour", inversedBy="examins")
     */
    private $matiere_cour;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Proffesseur", inversedBy="examins")
     */
    private $proffesseur;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Classeroom", inversedBy="examins")
     */
    private $classeroom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeExamin", inversedBy="examins")
     */
    private $type_examin;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NoteExaminEleve", mappedBy="examin")
     */
    private $noteExaminEleves;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    public function __construct()
    {
        $this->classeroom = new ArrayCollection();
        $this->noteExaminEleves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatiereCour(): ?MatiereCour
    {
        return $this->matiere_cour;
    }

    public function setMatiereCour(?MatiereCour $matiere_cour): self
    {
        $this->matiere_cour = $matiere_cour;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function getTypeExamin(): ?TypeExamin
    {
        return $this->type_examin;
    }

    public function setTypeExamin(?TypeExamin $type_examin): self
    {
        $this->type_examin = $type_examin;

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
            $noteExaminElefe->setExamin($this);
        }

        return $this;
    }

    public function removeNoteExaminElefe(NoteExaminEleve $noteExaminElefe): self
    {
        if ($this->noteExaminEleves->contains($noteExaminElefe)) {
            $this->noteExaminEleves->removeElement($noteExaminElefe);
            // set the owning side to null (unless already changed)
            if ($noteExaminElefe->getExamin() === $this) {
                $noteExaminElefe->setExamin(null);
            }
        }

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function __toString()
    {
        return $this->getTitle();
    }


}
