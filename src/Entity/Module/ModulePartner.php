<?php

namespace App\Entity\Module;

use App\Repository\Module\ModulePartnerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Entity\Partner;

/**
 * @ORM\Entity(repositoryClass=ModulePartnerRepository::class)
 * @Vich\Uploadable
 */
class ModulePartner extends Module
{
    /**
     * @ORM\ManyToMany(targetEntity=Partner::class)
     */
    private $partners;

    public function __construct()
    {
        $this->partners = new ArrayCollection();
    }

    /**
     * @return Collection|Partner[]
     */
    public function getPartners(): Collection
    {
        return $this->partners;
    }

    public function addPartner(Partner $partner): self
    {
        if (!$this->partners->contains($partner)) {
            $this->partners[] = $partner;
        }

        return $this;
    }

    public function removePartner(Partner $partner): self
    {
        $this->partners->removeElement($partner);

        return $this;
    }

    public function getType()
    {
        return 'MODULE_PARTNER';
    }
}
