<?php

namespace App\Entity;

use App\Repository\SiteConfigRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=SiteConfigRepository::class)
 * @Vich\Uploadable
 */
class SiteConfig
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slogan;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $localisation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @Vich\UploadableField(mapping="uploaded_files", fileNameProperty="banner.name", size="banner.size", mimeType="banner.mimeType", originalName="banner.originalName", dimensions="banner.dimensions")
     * 
     * @var File|null
     */
    private $bannerFile;

    /**
     * @ORM\Embedded(class="Vich\UploaderBundle\Entity\File")
     *
     * @var EmbeddedFile
     */
    private $banner;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contactFormTitle;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contactFormText;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contactFormEmailTo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contactFormPageTitle;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $siteMap;

    public function __construct()
    {
        $this->banner = new EmbeddedFile();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlogan(): ?string
    {
        return $this->slogan;
    }

    public function setSlogan(?string $slogan): self
    {
        $this->slogan = $slogan;

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

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param File|UploadedFile|null $bannerFile
     */
    public function setBannerFile(?File $bannerFile = null)
    {
        $this->bannerFile = $bannerFile;

        if (null !== $bannerFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getBannerFile(): ?File
    {
        return $this->bannerFile;
    }

    public function setBanner(EmbeddedFile $banner): void
    {
        $this->banner = $banner;
    }

    public function getBanner(): ?EmbeddedFile
    {
        return $this->banner;
    }

    public function getContactFormTitle(): ?string
    {
        return $this->contactFormTitle;
    }

    public function setContactFormTitle(?string $contactFormTitle): self
    {
        $this->contactFormTitle = $contactFormTitle;

        return $this;
    }

    public function getContactFormText(): ?string
    {
        return $this->contactFormText;
    }

    public function setContactFormText(?string $contactFormText): self
    {
        $this->contactFormText = $contactFormText;

        return $this;
    }

    public function getContactFormEmailTo(): ?string
    {
        return $this->contactFormEmailTo;
    }

    public function setContactFormEmailTo(string $contactFormEmailTo): self
    {
        $this->contactFormEmailTo = $contactFormEmailTo;

        return $this;
    }

    public function getContactFormPageTitle(): ?string
    {
        return $this->contactFormPageTitle;
    }

    public function setContactFormPageTitle(?string $contactFormPageTitle): self
    {
        $this->contactFormPageTitle = $contactFormPageTitle;

        return $this;
    }

    public function getSiteMap(): ?string
    {
        return $this->siteMap;
    }

    public function setSiteMap(?string $siteMap): self
    {
        $this->siteMap = $siteMap;

        return $this;
    }
}
