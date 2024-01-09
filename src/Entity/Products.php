<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
#[ApiResource()]
class Products
{
    use Traits\nameTrait;
    use Traits\slugTrait;
    use Traits\descriptionTrait;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank(message: 'Le prix ne peut pas être vide')]
    #[Assert\PositiveOrZero(message: 'Le prix ne peut pas être négatif')]
    private ?int $price = null;

    #[ORM\Column(type: 'integer')]
    #[Assert\PositiveOrZero(message: 'Le stock ne peut pas être négatif')]
    private ?int $stock = null;

    #[ORM\OneToMany(mappedBy: 'products', targetEntity: PicturesProducts::class)]
    private Collection $pictures;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?PlatformsProducts $platform = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?CategorysProducts $category = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?GenresProducts $genre = null;

    #[ORM\OneToMany(mappedBy: 'products', targetEntity: OrderDetails::class)]
    private Collection $orderDetails;

    public function __construct()
    {
        $this->pictures = new ArrayCollection();
        $this->orderDetails = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * @return Collection<int, PicturesProducts>
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(PicturesProducts $picture): static
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures->add($picture);
            $picture->setProducts($this);
        }

        return $this;
    }

    public function removePicture(PicturesProducts $picture): static
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getProducts() === $this) {
                $picture->setProducts(null);
            }
        }

        return $this;
    }

    public function getPlatform(): ?PlatformsProducts
    {
        return $this->platform;
    }

    public function setPlatform(?PlatformsProducts $platform): static
    {
        $this->platform = $platform;

        return $this;
    }

    public function getCategory(): ?CategorysProducts
    {
        return $this->category;
    }

    public function setCategory(?CategorysProducts $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getGenre(): ?GenresProducts
    {
        return $this->genre;
    }

    public function setGenre(?GenresProducts $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * @return Collection<int, OrderDetails>
     */
    public function getOrderDetails(): Collection
    {
        return $this->orderDetails;
    }

    public function addOrderDetail(OrderDetails $orderDetail): static
    {
        if (!$this->orderDetails->contains($orderDetail)) {
            $this->orderDetails->add($orderDetail);
            $orderDetail->setProducts($this);
        }

        return $this;
    }

    public function removeOrderDetail(OrderDetails $orderDetail): static
    {
        if ($this->orderDetails->removeElement($orderDetail)) {
            // set the owning side to null (unless already changed)
            if ($orderDetail->getProducts() === $this) {
                $orderDetail->setProducts(null);
            }
        }

        return $this;
    }
}
