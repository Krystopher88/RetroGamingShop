<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait nameTrait
{
    #[ORM\Column(type: 'string', length: 128)]
    private string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}