<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CiviliteRepository")
 */
class Civilite
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
     * @ORM\OneToMany(targetEntity="App\Entity\ParentPereMere", mappedBy="civilite")
     */
    private $civilte_p1;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ParentPereMere", mappedBy="civilite_p2")
     */
    private $parent_p2;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Proffesseur", mappedBy="civilite")
     */
    private $proffesseurs;

    public function __construct()
    {
        $this->civilte_p1 = new ArrayCollection();
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
     * @return Collection|ParentPereMere[]
     */
    public function getCivilteP1(): Collection
    {
        return $this->civilte_p1;
    }

    public function addCivilteP1(ParentPereMere $civilteP1): self
    {
        if (!$this->civilte_p1->contains($civilteP1)) {
            $this->civilte_p1[] = $civilteP1;
            $civilteP1->setCivilite($this);
        }

        return $this;
    }

    public function removeCivilteP1(ParentPereMere $civilteP1): self
    {
        if ($this->civilte_p1->contains($civilteP1)) {
            $this->civilte_p1->removeElement($civilteP1);
            // set the owning side to null (unless already changed)
            if ($civilteP1->getCivilite() === $this) {
                $civilteP1->setCivilite(null);
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
            $parentP2->setCiviliteP2($this);
        }

        return $this;
    }

    public function removeParentP2(ParentPereMere $parentP2): self
    {
        if ($this->parent_p2->contains($parentP2)) {
            $this->parent_p2->removeElement($parentP2);
            // set the owning side to null (unless already changed)
            if ($parentP2->getCiviliteP2() === $this) {
                $parentP2->setCiviliteP2(null);
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
            $proffesseur->setCivilite($this);
        }

        return $this;
    }

    public function removeProffesseur(Proffesseur $proffesseur): self
    {
        if ($this->proffesseurs->contains($proffesseur)) {
            $this->proffesseurs->removeElement($proffesseur);
            // set the owning side to null (unless already changed)
            if ($proffesseur->getCivilite() === $this) {
                $proffesseur->setCivilite(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}
