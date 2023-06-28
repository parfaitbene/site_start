<?php

namespace App\Entity\Module;

use App\Repository\Module\Module3Repository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;

/**
 * @ORM\Entity(repositoryClass=Module3Repository::class)
 * @Vich\Uploadable
 */
class Module3 extends Module
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
     * @Vich\UploadableField(mapping="uploaded_files", fileNameProperty="image1.name", originalName="image1.originalName")
     * 
     * @var File|null
     */
    private $image1File;

    /**
     * @ORM\Embedded(class="Vich\UploaderBundle\Entity\File")
     *
     * @var EmbeddedFile
     */
    private $image1;

    /**
     * 
     * @Vich\UploadableField(mapping="uploaded_files", fileNameProperty="image2.name", originalName="image2.originalName")
     * 
     * @var File|null
     */
    private $image2File;

    /**
     * @ORM\Embedded(class="Vich\UploaderBundle\Entity\File")
     *
     * @var EmbeddedFile
     */
    private $image2;

    /**
     * 
     * @Vich\UploadableField(mapping="uploaded_files", fileNameProperty="image3.name", originalName="image3.originalName")
     * 
     * @var File|null
     */
    private $image3File;

    /**
     * @ORM\Embedded(class="Vich\UploaderBundle\Entity\File")
     *
     * @var EmbeddedFile
     */
    private $image3;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;
    
    public function __construct()
    {
        $this->image1 = new EmbeddedFile();
        $this->image2 = new EmbeddedFile();
        $this->image3 = new EmbeddedFile();
        $this->updatedAt = new \DateTime();
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
     * @param File|UploadedFile|null $image1File
     */
    public function setImage1File(?File $image1File = null)
    {
        $this->image1File = $image1File;

        if (null !== $image1File) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImage1File(): ?File
    {
        return $this->image1File;
    }

    public function setImage1(EmbeddedFile $image1): void
    {
        $this->image1 = $image1;
    }

    public function getImage1(): ?EmbeddedFile
    {
        return $this->image1;
    }

    /**
     * @param File|UploadedFile|null $image2File
     */
    public function setImage2File(?File $image2File = null)
    {
        $this->image2File = $image2File;

        if (null !== $image2File) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImage2File(): ?File
    {
        return $this->image2File;
    }

    public function setImage2(EmbeddedFile $image2): void
    {
        $this->image2 = $image2;
    }

    public function getImage2(): ?EmbeddedFile
    {
        return $this->image2;
    }

    /**
     * @param File|UploadedFile|null $image3File
     */
    public function setImage3File(?File $image3File = null)
    {
        $this->image3File = $image3File;

        if (null !== $image3File) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImage3File(): ?File
    {
        return $this->image3File;
    }

    public function setImage3(EmbeddedFile $image3): void
    {
        $this->image3 = $image3;
    }

    public function getImage3(): ?EmbeddedFile
    {
        return $this->image3;
    }

    public function getType()
    {
        return 'MODULE3';
    }
}
