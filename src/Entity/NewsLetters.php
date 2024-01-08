<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\NewsLettersRepository;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: NewsLettersRepository::class)]
class NewsLetters
{
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

    #[ORM\Column(length: 255)]
    private ?string $secondaryTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $pictureSecondaryTitle = null;

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
}
