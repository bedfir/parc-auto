<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=127)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Voiture::class, mappedBy="categorie", orphanRemoval=true)
     */
    private $categorieVoiture;

    public function __construct()
    {
        $this->categorieVoiture = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }

    /**
     * @return Collection|Voiture[]
     */
    public function getCategorieVoiture(): Collection
    {
        return $this->categorieVoiture;
    }

    public function addCategorieVoiture(Voiture $categorieVoiture): self
    {
        if (!$this->categorieVoiture->contains($categorieVoiture)) {
            $this->categorieVoiture[] = $categorieVoiture;
            $categorieVoiture->setCategorie($this);
        }

        return $this;
    }

    public function removeCategorieVoiture(Voiture $categorieVoiture): self
    {
        if ($this->categorieVoiture->removeElement($categorieVoiture)) {
            // set the owning side to null (unless already changed)
            if ($categorieVoiture->getCategorie() === $this) {
                $categorieVoiture->setCategorie(null);
            }
        }

        return $this;
    }
}
