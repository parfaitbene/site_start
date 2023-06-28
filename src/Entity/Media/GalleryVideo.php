<?php

namespace App\Entity\Media;

use App\Repository\Media\GalleryVideoRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=GalleryVideoRepository::class)
 * @Vich\Uploadable
 */
class GalleryVideo extends GalleryMedia
{
    /**
     * @ORM\Column(type="text")
     */
    private $videoLink;

    public function getVideoLink(): ?string
    {
        return $this->videoLink;
    }

    public function setVideoLink(string $videoLink): self
    {
        $this->videoLink = $videoLink;

        return $this;
    }

    public function getType()
    {
        return 'VIDEO_LINK';
    }
}
