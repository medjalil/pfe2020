<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;



/**
 * @ORM\Entity(repositoryClass="App\Repository\ActualiteRepository")
 * @Vich\Uploadable
 */
class Actualite
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contenu;
    
      /**
     * @ORM\Column(type="string", length=255)
     * @var string|null
     */
    private $image;

     /**
     * @Vich\UploadableField(mapping="products", fileNameProperty="image")
     * @var string|null
     */
    private $imageFile;

  

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;
      /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

  
    public function getImage(): ?string
    {
        return $this->image;
    }
    

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
    
  
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
  
    public function setImageFile(?File $imageFile = null)
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
           
            $this->updated_at = new \DateTime('now');
        }
    }
   

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
    /**
     * @return \DateTimeInterface|null
     */
    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    /**
     * @param \DateTimeInterface|null $updated
     * @return $this
     */
    public function setUpdated(?\DateTimeInterface $updated): self
    {
        $this->updated = $updated;
        return $this;
    }
  
   
    
}
