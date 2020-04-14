<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClasseroomRepository")
 */
class Classeroom
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\MatiereCour", mappedBy="classeroom")
     */
    private $matiereCours;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Examin", mappedBy="classeroom")
     */
    private $examins;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NoteExaminEleve", mappedBy="classeroom")
     * @Assert\NotBlank(message=" Entrer le nom d'éleve !")
     */
    private $noteExaminEleves;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Eleve", mappedBy="classeroom")
     */
    private $eleves;

    public function __construct()
    {
        $this->matiereCours = new ArrayCollection();
        $this->examins = new ArrayCollection();
        $this->noteExaminEleves = new ArrayCollection();
        $this->eleves = new ArrayCollection();
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
            $matiereCour->addClasseroom($this);
        }

        return $this;
    }

    public function removeMatiereCour(MatiereCour $matiereCour): self
    {
        if ($this->matiereCours->contains($matiereCour)) {
            $this->matiereCours->removeElement($matiereCour);
            $matiereCour->removeClasseroom($this);
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
            $examin->addClasseroom($this);
        }

        return $this;
    }

    public function removeExamin(Examin $examin): self
    {
        if ($this->examins->contains($examin)) {
            $this->examins->removeElement($examin);
            $examin->removeClasseroom($this);
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
            $noteExaminElefe->setClasseroom($this);
        }

        return $this;
    }

    public function removeNoteExaminElefe(NoteExaminEleve $noteExaminElefe): self
    {
        if ($this->noteExaminEleves->contains($noteExaminElefe)) {
            $this->noteExaminEleves->removeElement($noteExaminElefe);
            // set the owning side to null (unless already changed)
            if ($noteExaminElefe->getClasseroom() === $this) {
                $noteExaminElefe->setClasseroom(null);
            }
        }

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
            $elefe->setClasseroom($this);
        }

        return $this;
    }

    public function removeElefe(Eleve $elefe): self
    {
        if ($this->eleves->contains($elefe)) {
            $this->eleves->removeElement($elefe);
            // set the owning side to null (unless already changed)
            if ($elefe->getClasseroom() === $this) {
                $elefe->setClasseroom(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}
