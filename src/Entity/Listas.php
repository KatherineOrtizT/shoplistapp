<?php

namespace App\Entity;

use App\Repository\ListasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListasRepository::class)]
class Listas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fecha_de_creacion = null;


    #[ORM\Column]
    private ?int $total = null;

    #[ORM\OneToMany(mappedBy: 'id_lista', targetEntity: ProductosLista::class)]
    private Collection $productosListas;

    #[ORM\ManyToOne(inversedBy: 'listas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $id_user = null;

    public function __construct()
    {
        $this->productosListas = new ArrayCollection();
        $this->fecha_de_creacion=new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getFechaDeCreacion(): ?\DateTimeInterface
    {
        return $this->fecha_de_creacion;
    }

    public function setFechaDeCreacion(\DateTimeInterface $fecha_de_creacion): self
    {
        $this->fecha_de_creacion = $fecha_de_creacion;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return Collection<int, ProductosLista>
     */
    public function getProductosListas(): Collection
    {
        return $this->productosListas;
    }

    public function addProductosLista(ProductosLista $productosLista): self
    {
        if (!$this->productosListas->contains($productosLista)) {
            $this->productosListas->add($productosLista);
            $productosLista->setIdLista($this);
        }

        return $this;
    }

    public function removeProductosLista(ProductosLista $productosLista): self
    {
        if ($this->productosListas->removeElement($productosLista)) {
            // set the owning side to null (unless already changed)
            if ($productosLista->getIdLista() === $this) {
                $productosLista->setIdLista(null);
            }
        }

        return $this;
    }

    public function getIdUser(): ?user
    {
        return $this->id_user;
    }

    public function setIdUser(?user $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }
}
