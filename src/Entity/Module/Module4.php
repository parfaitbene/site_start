<?php

namespace App\Entity\Module;

use App\Repository\Module\Module4Repository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=Module4Repository::class)
 * @Vich\Uploadable
 */
class Module4 extends Module2
{
    public function getType()
    {
        return 'MODULE4';
    }
}
