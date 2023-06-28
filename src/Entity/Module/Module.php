<?php

namespace App\Entity\Module;

use App\Repository\Module\ModuleRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ModuleRepository::class)
 * @Vich\Uploadable
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")   
 * @ORM\DiscriminatorMap({
 *  "MODULE1" = "Module1", 
 *  "MODULE2" = "Module2",
 *  "MODULE3" = "Module3",
 *  "MODULE4" = "Module4",
 *  "MODULE5" = "Module5",
 *  "MODULE6" = "Module6",
 *  "MODULE_MARKETING_BLOCK" = "ModuleMarketingBlock",
 *  "MODULE_ARTICLE" = "ModuleArticle",
 *  "MODULE_PARALLAX" = "ModuleParallax",
 *  "MODULE_FORMULE" = "ModuleFormule",
 *  "MODULE_TESTIMONIAL" = "ModuleTestimonial",
 *  "MODULE_PARTNER" = "ModulePartner"
 * })
 */
abstract class Module
{
    const POSITION_HOME_TOP = "HOME_TOP";
    const POSITION_HOME_BOTTOM = "HOME_BOTTOM";

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $sequence;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $active;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $position;
    
    public function __toString() {
        return $this->getName();
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

    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    public function setSequence(?int $sequence): self
    {
        $this->sequence = $sequence;

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

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;

        return $this;
    }
}
