<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait descriptionTrait
{
    #[ORM\Column(type: 'text')]
    private string $description;

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): descriptionTrait
    {
        $this->description = $description;
        return $this;
    }
}