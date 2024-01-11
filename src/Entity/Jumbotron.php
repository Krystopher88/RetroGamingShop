<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\JumbotronRepository;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: JumbotronRepository::class)]
#[Vich\Uploadable]
#[ApiResource]
class Jumbotron
{
    use Traits\nameTrait;
    use Traits\slugTrait;
    use Traits\descriptionTrait;
    use Traits\pictureNameTrait;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[Vich\UploadableField(mapping: 'jumbotron', fileNameProperty: 'pictureName')]
    private ?File $pictureFile = null;

    #[ORM\Column(type: 'boolean')]
    private ?bool $is_publish = false;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setPictureFile(?File $pictureFile = null): void
    {
        $this->pictureFile = $pictureFile;

        if (null !== $pictureFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getPictureFile(): ?File
    {
        return $this->pictureFile;
    }

    public function isIsPublish(): ?bool
    {
        return $this->is_publish;
    }

    public function setIsPublish(bool $is_publish): self
    {
        $this->is_publish = $is_publish;

        return $this;
    }
}
