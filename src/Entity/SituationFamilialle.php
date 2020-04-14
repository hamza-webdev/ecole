<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SituationFamilialleRepository")
 */
class SituationFamilialle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Classeroom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $desciption;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ParentPereMere", mappedBy="situation_Familiale")
     */
    private $parentPereMeres;

    public function __construct()
    {
        $this->parentPereMeres = new ArrayCollection();
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

    public function getClasseroom(): ?string
    {
        return $this->Classeroom;
    }

    public function setClasseroom(string $Classeroom): self
    {
        $this->Classeroom = $Classeroom;

        return $this;
    }

    public function getDesciption(): ?string
    {
        return $this->desciption;
    }

    public function setDesciption(?string $desciption): self
    {
        $this->desciption = $desciption;

        return $this;
    }

    /**
     * @return Collection|ParentPereMere[]
     */
    public function getParentPereMeres(): Collection
    {
        return $this->parentPereMeres;
    }

    public function addParentPereMere(ParentPereMere $parentPereMere): self
    {
        if (!$this->parentPereMeres->contains($parentPereMere)) {
            $this->parentPereMeres[] = $parentPereMere;
            $parentPereMere->setSituationFamiliale($this);
        }

        return $this;
    }

    public function removeParentPereMere(ParentPereMere $parentPereMere): self
    {
        if ($this->parentPereMeres->contains($parentPereMere)) {
            $this->parentPereMeres->removeElement($parentPereMere);
            // set the owning side to null (unless already changed)
            if ($parentPereMere->getSituationFamiliale() === $this) {
                $parentPereMere->setSituationFamiliale(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}
