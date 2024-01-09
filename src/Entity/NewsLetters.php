<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\NewsLettersRepository;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: NewsLettersRepository::class)]
#[Vich\Uploadable]
class NewsLetters
{
    use Traits\nameTrait;
    use Traits\slugTrait;
    use Traits\descriptionTrait;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $mainTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $bannerName = null;

    #[Vich\UploadableField(mapping: 'newsLetters', fileNameProperty: 'bannerName')]
    private ?File $bannerFile = null;

    #[ORM\Column(length: 255)]
    private ?string $secondaryTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $pictureSecondaryTitle = null;

    #[Vich\UploadableField(mapping: 'newsLetters', fileNameProperty: 'pictureSecondaryTitle')]
    private ?File $pictureSecondaryFile = null;

    public function __contrsuct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMainTitle(): ?string
    {
        return $this->mainTitle;
    }

    public function setMainTitle(string $mainTitle): static
    {
        $this->mainTitle = $mainTitle;

        return $this;
    }

    public function getBannerName(): ?string
    {
        return $this->bannerName;
    }

    public function setBannerName(string $bannerName): static
    {
        $this->bannerName = $bannerName;

        return $this;
    }

    public function setBannerFile(?File $bannerFile = null): void
    {
        $this->bannerFile = $bannerFile;

        if (null !== $bannerFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getBannerFile(): ?File
    {
        return $this->bannerFile;
    }

    public function getSecondaryTitle(): ?string
    {
        return $this->secondaryTitle;
    }

    public function setSecondaryTitle(string $secondaryTitle): static
    {
        $this->secondaryTitle = $secondaryTitle;

        return $this;
    }

    public function getPictureSecondaryTitle(): ?string
    {
        return $this->pictureSecondaryTitle;
    }

    public function setPictureSecondaryTitle(string $pictureSecondaryTitle): static
    {
        $this->pictureSecondaryTitle = $pictureSecondaryTitle;

        return $this;
    }

    public function setPictureSecondaryFile(?File $pictureSecondaryFile = null): void
    {
        $this->pictureSecondaryFile = $pictureSecondaryFile;

        if (null !== $pictureSecondaryFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getPictureSecondaryFile(): ?File
    {
        return $this->pictureSecondaryFile;
    }
}
