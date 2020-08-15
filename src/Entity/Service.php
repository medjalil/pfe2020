<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;



/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 * @Vich\Uploadable
 */
class Service
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
    private $nomService;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;
     /**
     * @Vich\UploadableField(mapping="products", fileNameProperty="image")
     * @var File
     */
    private $imageFile;
      /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomService(): ?string
    {
        return $this->nomService;
    }

    public function setNomService(string $nomService): self
    {
        $this->nomService = $nomService;

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
     
    public function getImage(): ?string
    {
        return $this->image;
    }
 
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
     /**
     * @return File|null
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
      /**
     * @param File|null $imageFile
     */
  
    public function setImageFile(?File $imageFile = null)
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
           
            $this->updatedAt = new DateTimeImmutable();
        }
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
