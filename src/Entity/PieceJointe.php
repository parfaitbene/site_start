<?php

namespace App\Entity;

use App\Repository\PieceJointeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Entity\Module\Module5;

/**
 * @ORM\Entity(repositoryClass=PieceJointeRepository::class)
 * @Vich\Uploadable
 */
class PieceJointe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="uploaded_files", fileNameProperty="pj.name", size="pj.size", mimeType="pj.mimeType", originalName="pj.originalName", dimensions="pj.dimensions")
     * 
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

    /**
     * @ORM\ManyToOne(targetEntity=Module5::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=true)
     */
    private $module5; //slider 3D

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

    public function __construct()
    {
        $this->pj = new EmbeddedFile();
        $this->updatedAt = new \DateTime();
    }
    
    public function __toString(): ?string
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getModule5(): ?Module5
    {
        return $this->module5;
    }

    public function setModule5(?Module5 $module5): self
    {
        $this->module5 = $module5;

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
}
