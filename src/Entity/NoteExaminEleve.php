<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NoteExaminEleveRepository")
 */
class NoteExaminEleve
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Examin", inversedBy="noteExaminEleves")
     */
    private $examin;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MatiereCour", inversedBy="noteExaminEleves")
     */
    private $matiere_cour;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Proffesseur", inversedBy="noteExaminEleves")
     */
    private $proffesseur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Classeroom", inversedBy="noteExaminEleves")
     * @Assert\NotBlank(message=" Entrer le nom d'éleve !")
     */
    private $classeroom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Eleve", inversedBy="noteExaminEleves")
     * @Assert\NotBlank(message=" Entrer le nom d'éleve !")
     */
    private $eleve;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getExamin(): ?Examin
    {
        return $this->examin;
    }

    public function setExamin(?Examin $examin): self
    {
        $this->examin = $examin;

        return $this;
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

    public function getClasseroom(): ?Classeroom
    {
        return $this->classeroom;
    }

    public function setClasseroom(?Classeroom $classeroom): self
    {
        $this->classeroom = $classeroom;

        return $this;
    }

    public function getEleve(): ?Eleve
    {
        return $this->eleve;
    }

    public function setEleve(?Eleve $eleve): self
    {
        $this->eleve = $eleve;

        return $this;
    }
}
