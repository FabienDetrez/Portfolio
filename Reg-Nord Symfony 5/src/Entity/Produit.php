<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptif;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $construction;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $taille;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $classeDePression;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $plageDeTemperature;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $materiau;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $tauxDeFuite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $specification;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $statut;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Media", mappedBy="produits", cascade={"persist", "remove"})
     */
    private $media;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Marque", inversedBy="produits")
     */
    private $marques;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gamme", inversedBy="produits")
     */
    private $gammes;

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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function getConstruction(): ?string
    {
        return $this->construction;
    }

    public function setConstruction(?string $construction): self
    {
        $this->construction = $construction;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(?string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getClasseDePression(): ?string
    {
        return $this->classeDePression;
    }

    public function setClasseDePression(?string $classeDePression): self
    {
        $this->classeDePression = $classeDePression;

        return $this;
    }

    public function getPlageDeTemperature(): ?string
    {
        return $this->plageDeTemperature;
    }

    public function setPlageDeTemperature(?string $plageDeTemperature): self
    {
        $this->plageDeTemperature = $plageDeTemperature;

        return $this;
    }

    public function getMateriau(): ?string
    {
        return $this->materiau;
    }

    public function setMateriau(?string $materiau): self
    {
        $this->materiau = $materiau;

        return $this;
    }

    public function getTauxDeFuite(): ?string
    {
        return $this->tauxDeFuite;
    }

    public function setTauxDeFuite(?string $tauxDeFuite): self
    {
        $this->tauxDeFuite = $tauxDeFuite;

        return $this;
    }

    public function getSpecification(): ?string
    {
        return $this->specification;
    }

    public function setSpecification(?string $specification): self
    {
        $this->specification = $specification;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(?bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getMedia(): ?Media
    {
        return $this->media;
    }

    public function setMedia(?Media $media): self
    {
        $this->media = $media;

        // set (or unset) the owning side of the relation if necessary
        $newProduits = null === $media ? null : $this;
        if ($media->getProduits() !== $newProduits) {
            $media->setProduits($newProduits);
        }

        return $this;
    }

    public function getMarques(): ?Marque
    {
        return $this->marques;
    }

    public function setMarques(?Marque $marques): self
    {
        $this->marques = $marques;

        return $this;
    }

    public function getGammes(): ?Gamme
    {
        return $this->gammes;
    }

    public function setGammes(?Gamme $gammes): self
    {
        $this->gammes = $gammes;

        return $this;
    }
}
