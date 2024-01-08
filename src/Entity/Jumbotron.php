<?php

namespace App\Entity;

use App\Repository\JumbotronRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: JumbotronRepository::class)]
class Jumbotron
{
    use Traits\slugTrait;
    use Traits\descriptionTrait;
    use Traits\pictureNameTrait;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?bool $is_publish = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function isIsPublish(): ?bool
    {
        return $this->is_publish;
    }

    public function setIsPublish(bool $is_publish): static
    {
        $this->is_publish = $is_publish;

        return $this;
    }
}
