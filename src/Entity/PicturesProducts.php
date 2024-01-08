<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PicturesProductsRepository;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: PicturesProductsRepository::class)]
class PicturesProducts
{
    use Traits\pictureNameTrait;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'pictures')]
    private ?Products $products = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProducts(): ?Products
    {
        return $this->products;
    }

    public function setProducts(?Products $products): static
    {
        $this->products = $products;

        return $this;
    }
}
