<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatiereRepository")
 */
class Matiere
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
     * @ORM\Column(type="float", nullable=true)
     */
    private $coefficient;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MatiereCour", mappedBy="matiere")
     */
    private $matiereCours;

    public function __construct()
    {
        $this->matiereCours = new ArrayCollection();
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

    public function getCoefficient(): ?float
    {
        return $this->coefficient;
    }

    public function setCoefficient(?float $coefficient): self
    {
        $this->coefficient = $coefficient;

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
            $matiereCour->setMatiere($this);
        }

        return $this;
    }

    public function removeMatiereCour(MatiereCour $matiereCour): self
    {
        if ($this->matiereCours->contains($matiereCour)) {
            $this->matiereCours->removeElement($matiereCour);
            // set the owning side to null (unless already changed)
            if ($matiereCour->getMatiere() === $this) {
                $matiereCour->setMatiere(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getTitle();
    }

}
