<?php

namespace App\Entity\Module;

use App\Repository\Module\Module1Repository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;

/**
 * @ORM\Entity(repositoryClass=Module1Repository::class)
 * @Vich\Uploadable
 */
class Module1 extends Module
{
    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $buttonText;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $buttonUrl;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isUrlNewWindow;

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
     * 
     * @Vich\UploadableField(mapping="uploaded_files", fileNameProperty="bgImage.name", originalName="bgImage.originalName")
     * 
     * @var File|null
     */
    private $bgImageFile;

    /**
     * @ORM\Embedded(class="Vich\UploaderBundle\Entity\File")
     *
     * @var EmbeddedFile
     */
    private $bgImage;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;
    
    public function __construct()
    {
        $this->image = new EmbeddedFile();
        $this->bgImage = new EmbeddedFile();
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getButtonText(): ?string
    {
        return $this->buttonText;
    }

    public function setButtonText(?string $buttonText): self
    {
        $this->buttonText = $buttonText;

        return $this;
    }

    public function getButtonUrl(): ?string
    {
        return $this->buttonUrl;
    }

    public function setButtonUrl(?string $buttonUrl): self
    {
        $this->buttonUrl = $buttonUrl;

        return $this;
    }

    public function getIsUrlNewWindow(): ?bool
    {
        return $this->isUrlNewWindow;
    }

    public function setIsUrlNewWindow(?bool $isUrlNewWindow): self
    {
        $this->isUrlNewWindow = $isUrlNewWindow;

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

    /**
     * @param File|UploadedFile|null $bgImageFile
     */
    public function setBgImageFile(?File $bgImageFile = null)
    {
        $this->bgImageFile = $bgImageFile;

        if (null !== $bgImageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getBgImageFile(): ?File
    {
        return $this->bgImageFile;
    }

    public function setBgImage(EmbeddedFile $bgImage): void
    {
        $this->bgImage = $bgImage;
    }

    public function getBgImage(): ?EmbeddedFile
    {
        return $this->bgImage;
    }

    public function getType()
    {
        return 'MODULE1';
    }
}
