<?php

namespace App\Entity\Media;

use App\Repository\Media\GalleryMediaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=GalleryMediaRepository::class)
 * @Vich\Uploadable
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap
    ({
        "MEDIA" = "GalleryMedia", 
        "VIDEO_LINK" = "GalleryVideo"
    }) 
 */
class GalleryMedia
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default": false})
     */
    private $active;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlText;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isUrlNewWindow;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sequence;

    /**
     * @ORM\ManyToOne(targetEntity=GalleryCategory::class, inversedBy="medias")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="gallery_files", fileNameProperty="pj.name", size="pj.size", mimeType="pj.mimeType", originalName="pj.originalName", dimensions="pj.dimensions")
     * @Assert\File(
     *     maxSize = "250M",
     * )
     * @var File|null
     */
    private $pjFile;

    /**
     * @ORM\Embedded(class="Vich\UploaderBundle\Entity\File")
     *
     * @var EmbeddedFile
     */
    private $pj;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

    public function __construct()
    {
        $this->pj = new EmbeddedFile();
        $this->updatedAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?GalleryCategory
    {
        return $this->category;
    }

    public function setCategory(?GalleryCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param File|UploadedFile|null $pjFile
     */
    public function setPjFile(?File $pjFile = null)
    {
        $this->pjFile = $pjFile;

        if (null !== $pjFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getPjFile(): ?File
    {
        return $this->pjFile;
    }

    public function setPj(EmbeddedFile $pj): void
    {
        $this->pj = $pj;
    }

    public function getPj(): ?EmbeddedFile
    {
        return $this->pj;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getUrlText(): ?string
    {
        return $this->urlText;
    }

    public function setUrlText(?string $urlText): self
    {
        $this->urlText = $urlText;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    public function setSequence(?int $sequence): self
    {
        $this->sequence = $sequence;

        return $this;
    }

    public function getType()
    {
        return 'MEDIA';
    }
}
