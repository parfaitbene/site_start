<?php

namespace App\Entity\Module;

use App\Repository\Module\ModuleMarketingBlockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Entity\MarketingBlock;

/**
 * @ORM\Entity(repositoryClass=ModuleMarketingBlockRepository::class)
 * @Vich\Uploadable
 */
class ModuleMarketingBlock extends Module
{

    /**
     * @ORM\ManyToMany(targetEntity=MarketingBlock::class)
     */
    private $blocks;

    public function __construct()
    {
        $this->blocks = new ArrayCollection();
    }

    /**
     * @return Collection|MarketingBlock[]
     */
    public function getBlocks(): Collection
    {
        return $this->blocks;
    }

    public function addBlock(MarketingBlock $block): self
    {
        if (!$this->blocks->contains($block)) {
            $this->blocks[] = $block;
        }

        return $this;
    }

    public function removeBlock(MarketingBlock $block): self
    {
        $this->blocks->removeElement($block);

        return $this;
    }

    public function getType()
    {
        return 'MODULE_MARKETING_BLOCK';
    }
}
