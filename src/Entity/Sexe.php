<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SexeRepository")
 */
class Sexe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Eleve", mappedBy="sexe")
     */
    private $eleves;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ParentPereMere", mappedBy="sexe_p1")
     */
    private $parentP1;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ParentPereMere", mappedBy="sexe_p2")
     */
    private $parent_p2;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Proffesseur", mappedBy="sexe", orphanRemoval=true)
     */
    private $proffesseurs;

    public function __construct()
    {
        $this->eleves = new ArrayCollection();
        $this->parentP1 = new ArrayCollection();
        $this->parent_p2 = new ArrayCollection();
        $this->proffesseurs = new ArrayCollection();
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
            $elefe->setSexe($this);
        }

        return $this;
    }

    public function removeElefe(Eleve $elefe): self
    {
        if ($this->eleves->contains($elefe)) {
            $this->eleves->removeElement($elefe);
            // set the owning side to null (unless already changed)
            if ($elefe->getSexe() === $this) {
                $elefe->setSexe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ParentPereMere[]
     */
    public function getParentP1(): Collection
    {
        return $this->parentP1;
    }

    public function addParentP1(ParentPereMere $parentP1): self
    {
        if (!$this->parentP1->contains($parentP1)) {
            $this->parentP1[] = $parentP1;
            $parentP1->setSexeP1($this);
        }

        return $this;
    }

    public function removeParentP1(ParentPereMere $parentP1): self
    {
        if ($this->parentP1->contains($parentP1)) {
            $this->parentP1->removeElement($parentP1);
            // set the owning side to null (unless already changed)
            if ($parentP1->getSexeP1() === $this) {
                $parentP1->setSexeP1(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ParentPereMere[]
     */
    public function getParentP2(): Collection
    {
        return $this->parent_p2;
    }

    public function addParentP2(ParentPereMere $parentP2): self
    {
        if (!$this->parent_p2->contains($parentP2)) {
            $this->parent_p2[] = $parentP2;
            $parentP2->setSexeP2($this);
        }

        return $this;
    }

    public function removeParentP2(ParentPereMere $parentP2): self
    {
        if ($this->parent_p2->contains($parentP2)) {
            $this->parent_p2->removeElement($parentP2);
            // set the owning side to null (unless already changed)
            if ($parentP2->getSexeP2() === $this) {
                $parentP2->setSexeP2(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Proffesseur[]
     */
    public function getProffesseurs(): Collection
    {
        return $this->proffesseurs;
    }

    public function addProffesseur(Proffesseur $proffesseur): self
    {
        if (!$this->proffesseurs->contains($proffesseur)) {
            $this->proffesseurs[] = $proffesseur;
            $proffesseur->setSexe($this);
        }

        return $this;
    }

    public function removeProffesseur(Proffesseur $proffesseur): self
    {
        if ($this->proffesseurs->contains($proffesseur)) {
            $this->proffesseurs->removeElement($proffesseur);
            // set the owning side to null (unless already changed)
            if ($proffesseur->getSexe() === $this) {
                $proffesseur->setSexe(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}
