<?php

namespace App\Entity;

use App\Repository\FormuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;

/**
 * @ORM\Entity(repositoryClass=FormuleRepository::class)
 * @Vich\Uploadable
 */
class Formule
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $text;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default": false})
     */
    private $active;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sequence;
    
    /**
     * 
     * @Vich\UploadableField(mapping="formules_files", fileNameProperty="image.name", originalName="image.originalName")
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
     * @Vich\UploadableField(mapping="formules_files", fileNameProperty="bgImage.name", originalName="bgImage.originalName")
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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity=Bonus::class)
     */
    private $bonus;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $intro;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fees;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $canReserve;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="formule")
     */
    private $reservations;
    
    public function __construct()
    {
        $this->image = new EmbeddedFile();
        $this->bgImage = new EmbeddedFile();
        $this->bonus = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function __toString()
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

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

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

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection|Bonus[]
     */
    public function getBonus(): Collection
    {
        return $this->bonus;
    }

    public function addBonu(Bonus $bonu): self
    {
        if (!$this->bonus->contains($bonu)) {
            $this->bonus[] = $bonu;
        }

        return $this;
    }

    public function removeBonu(Bonus $bonu): self
    {
        $this->bonus->removeElement($bonu);

        return $this;
    }

    public function getIntro(): ?string
    {
        return $this->intro;
    }

    public function setIntro(?string $intro): self
    {
        $this->intro = $intro;

        return $this;
    }

    public function getFees(): ?int
    {
        return $this->fees;
    }

    public function setFees(?int $fees): self
    {
        $this->fees = $fees;

        return $this;
    }

    public function getCanReserve(): ?bool
    {
        return $this->canReserve;
    }

    public function setCanReserve(?bool $canReserve): self
    {
        $this->canReserve = $canReserve;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setFormule($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getFormule() === $this) {
                $reservation->setFormule(null);
            }
        }

        return $this;
    }
}
