<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\VoitureRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=VoitureRepository::class)
 */
class Voiture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     * min = 60,
     * max = 250,
     * notInRangeMessage = "La puisance doit être comprise entre {{ min }} et {{ max }} !",
     * )
     */
    private $puissance;

    /**
     * @ORM\Column(type="string", length=16)
     * @Assert\Choice({"rouge", "blanc", "noir"})
     */
    private $couleur;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="categorieVoiture")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPortes = 5;

    /**
     * @ORM\Column(type="string", length=31, unique=true)
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=31, unique=true)
     * @Gedmo\Slug(fields={"modele"}))
     */
    private $slug;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPuissance(): ?int
    {
        return $this->puissance;
    }

    public function setPuissance(int $puissance): self
    {
        $this->puissance = $puissance;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getNbPortes(): ?int
    {
        return $this->nbPortes;
    }

    public function setNbPortes(int $nbPortes): self
    {
        $this->nbPortes = $nbPortes;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
