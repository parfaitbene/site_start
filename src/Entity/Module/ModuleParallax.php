<?php

namespace App\Entity\Module;

use App\Repository\Module\ModuleParallaxRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;

/**
 * @ORM\Entity(repositoryClass=ModuleParallaxRepository::class)
 * @Vich\Uploadable
 */
class ModuleParallax extends Module
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title2;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default": true})
     */
    private $addMask;

    /**
     * 
     * @Vich\UploadableField(mapping="uploaded_files", fileNameProperty="image.name", originalName="image.originalName")
     * 
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Embedded(class="Vich\UploaderBundle\Entity\File")
     *
     * @var EmbeddedFile
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;
    
    public function __construct()
    {
        $this->image = new EmbeddedFile();
    }

    public function getTitle1(): ?string
    {
        return $this->title1;
    }

    public function setTitle1(?string $title1): self
    {
        $this->title1 = $title1;

        return $this;
    }

    public function getTitle2(): ?string
    {
        return $this->title2;
    }

    public function setTitle2(?string $title2): self
    {
        $this->title2 = $title2;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getAddMask(): ?bool
    {
        return $this->addMask;
    }

    public function setAddMask(?bool $addMask): self
    {
        $this->addMask = $addMask;

        return $this;
    }

    /**
     * @param File|UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null)
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImage(EmbeddedFile $image): void
    {
        $this->image = $image;
    }

    public function getImage(): ?EmbeddedFile
    {
        return $this->image;
    }

    public function getType()
    {
        return 'MODULE_PARALLAX';
    }
}
