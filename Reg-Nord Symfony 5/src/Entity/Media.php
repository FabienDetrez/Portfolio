<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MediaRepository")
 * @Vich\Uploadable()
 */
class Media
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
     * @ORM\Column(type="string", length=100)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $texte;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $carousel;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $marquee;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $produit;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $statut;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Produit", inversedBy="media", cascade={"persist", "remove"})
     */
    private $produits;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $gallerie;

     /**
     * @var string|null
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

    /**
     * @var File|null
     * @Assert\Image(mimeTypes={"image/jpeg", "image/jpg", "image/png"})
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="filename")
     *
     */
    private $imageFile;


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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(?string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    public function getCarousel(): ?bool
    {
        return $this->carousel;
    }

    public function setCarousel(?bool $carousel): self
    {
        $this->carousel = $carousel;

        return $this;
    }

    public function getMarquee(): ?bool
    {
        return $this->marquee;
    }

    public function setMarquee(?bool $marquee): self
    {
        $this->marquee = $marquee;

        return $this;
    }

    public function getProduit(): ?bool
    {
        return $this->produit;
    }

    public function setProduit(?bool $produit): self
    {
        $this->produit = $produit;

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

    public function getProduits(): ?Produit
    {
        return $this->produits;
    }

    public function setProduits(?Produit $produits): self
    {
        $this->produits = $produits;

        return $this;
    }

    public function getGallerie(): ?bool
    {
        return $this->gallerie;
    }

    public function setGallerie(?bool $gallerie): self
    {
        $this->gallerie = $gallerie;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param string|null $filename
     * @return Media
     */
    public function setFilename(?string $filename): Media
    {
        $this->filename = $filename;
        return $this;
    }


    /**
     * @ORM\Column(type="datetime")
     * @var null|DateTime
     */
    private $updated_at;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Marque", mappedBy="media", cascade={"persist", "remove"})
     */
    private $marque;

    /**
     * @return File|null
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }


    /**
     * @param File|null $imageFile
     *
     * @throws Exception
     */
    public function setImageFile(?File $imageFile): void
    {
        $this->imageFile = $imageFile;
        if ($this->imageFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        //return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        // set (or unset) the owning side of the relation if necessary
        $newMedia = null === $marque ? null : $this;
        if ($marque->getMedia() !== $newMedia) {
            $marque->setMedia($newMedia);
        }

        return $this;
    }
}
