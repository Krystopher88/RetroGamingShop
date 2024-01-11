<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait pictureNameTrait
{
    #[ORM\Column(type: 'string', length: 255)]
    private string $pictureName;

    public function getPictureName(): string
    {
        return $this->pictureName;
    }

    public function setPictureName(string $pictureName): self
    {
        $this->pictureName = $pictureName;

        return $this;
    }
}
