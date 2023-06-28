<?php

namespace App\Entity\Module;

use App\Repository\Module\ModuleFormuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Entity\Formule;

/**
 * @ORM\Entity(repositoryClass=ModuleFormuleRepository::class)
 * @Vich\Uploadable
 */
class ModuleFormule extends Module
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\ManyToMany(targetEntity=Formule::class)
     */
    private $formules;

    public function __construct()
    {
        $this->formules = new ArrayCollection();
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
     * @return Collection|Formule[]
     */
    public function getFormules(): Collection
    {
        return $this->formules;
    }

    public function addFormule(Formule $formule): self
    {
        if (!$this->formules->contains($formule)) {
            $this->formules[] = $formule;
        }

        return $this;
    }

    public function removeFormule(Formule $formule): self
    {
        $this->formules->removeElement($formule);

        return $this;
    }

    public function getType()
    {
        return 'MODULE_FORMULE';
    }
}
