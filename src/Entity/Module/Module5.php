<?php

namespace App\Entity\Module;

use App\Repository\Module\Module5Repository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Entity\PieceJointe;

/**
 * @ORM\Entity(repositoryClass=Module5Repository::class)
 * @Vich\Uploadable
 */
class Module5 extends Module //Slider 3D
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text;

    /**
     * @ORM\OneToMany(targetEntity=PieceJointe::class, mappedBy="module5", cascade={"persist", "remove"})
     */
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

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

    /**
     * @return Collection|PieceJointe[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(PieceJointe $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setModule5($this);
        }

        return $this;
    }

    public function removeImage(PieceJointe $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getModule5() === $this) {
                $image->setModule5(null);
            }
        }

        return $this;
    }

    public function getType()
    {
        return 'MODULE5';
    }
}
