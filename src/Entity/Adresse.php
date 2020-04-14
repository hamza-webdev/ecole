<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdresseRepository")
 */
class Adresse
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ParentPereMere", inversedBy="adresse_p1")
     */
    private $adresse_p1;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ParentPereMere", mappedBy="adresse_p2", cascade={"persist", "remove"})
     */
    private $adresse_p2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(?int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getAdresseP1(): ?ParentPereMere
    {
        return $this->adresse_p1;
    }

    public function setAdresseP1(?ParentPereMere $adresse_p1): self
    {
        $this->adresse_p1 = $adresse_p1;

        return $this;
    }

    public function getAdresseP2(): ?ParentPereMere
    {
        return $this->adresse_p2;
    }

    public function setAdresseP2(?ParentPereMere $adresse_p2): self
    {
        $this->adresse_p2 = $adresse_p2;

        // set (or unset) the owning side of the relation if necessary
        $newAdresse_p2 = null === $adresse_p2 ? null : $this;
        if ($adresse_p2->getAdresseP2() !== $newAdresse_p2) {
            $adresse_p2->setAdresseP2($newAdresse_p2);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getAdresse();
    }

}
