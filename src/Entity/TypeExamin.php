<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeExaminRepository")
 */
class TypeExamin
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
     * @ORM\OneToMany(targetEntity="App\Entity\Examin", mappedBy="type_examin")
     */
    private $examins;

    public function __construct()
    {
        $this->examins = new ArrayCollection();
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
            $examin->setTypeExamin($this);
        }

        return $this;
    }

    public function removeExamin(Examin $examin): self
    {
        if ($this->examins->contains($examin)) {
            $this->examins->removeElement($examin);
            // set the owning side to null (unless already changed)
            if ($examin->getTypeExamin() === $this) {
                $examin->setTypeExamin(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getTitle();
    }

}
