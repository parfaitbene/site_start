<?php

namespace App\Entity\Module;

use App\Repository\Module\ModuleTestimonialRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Entity\Testimonial;

/**
 * @ORM\Entity(repositoryClass=ModuleTestimonialRepository::class)
 * @Vich\Uploadable
 */
class ModuleTestimonial extends Module
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\ManyToMany(targetEntity=Testimonial::class)
     */
    private $testimonials;

    public function __construct()
    {
        $this->testimonials = new ArrayCollection();
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

    /**
     * @return Collection|Testimonial[]
     */
    public function getTestimonials(): Collection
    {
        return $this->testimonials;
    }

    public function addTestimonial(Testimonial $testimonial): self
    {
        if (!$this->testimonials->contains($testimonial)) {
            $this->testimonials[] = $testimonial;
        }

        return $this;
    }

    public function removeTestimonial(Testimonial $testimonial): self
    {
        $this->testimonials->removeElement($testimonial);

        return $this;
    }
    
    public function getType()
    {
        return 'MODULE_TESTIMONIAL';
    }
}
