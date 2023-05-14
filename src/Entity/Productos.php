<?php

namespace App\Entity;

use App\Repository\ProductosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductosRepository::class)]
class Productos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $marca = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $formato = null;

    #[ORM\Column(nullable: true)]
    private ?float $precio_A = null;

    #[ORM\Column(nullable: true)]
    private ?float $precio_C = null;

    #[ORM\Column(nullable: true)]
    private ?float $precio_D = null;

    #[ORM\Column(length: 255, nullable: true)]
    public ?string $Imagen_url = null;

    #[ORM\Column(length: 70)]
    private ?string $Supermercado = null;

   

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

    public function getMarca(): ?string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFormato(): ?string
    {
        return $this->formato;
    }

    public function setFormato(?string $formato): self
    {
        $this->formato = $formato;

        return $this;
    }

    public function getPrecioA(): ?float
    {
        return $this->precio_A;
    }

    public function setPrecioA(?float $precio_A): self
    {
        $this->precio_A = $precio_A;

        return $this;
    }

    public function getPrecioC(): ?float
    {
        return $this->precio_C;
    }

    public function setPrecioC(?float $precio_C): self
    {
        $this->precio_C = $precio_C;

        return $this;
    }

    public function getPrecioD(): ?float
    {
        return $this->precio_D;
    }

    public function setPrecioD(?float $precio_D): self
    {
        $this->precio_D = $precio_D;

        return $this;
    }

    public function getImagenUrl(): ?string
    {
        return $this->Imagen_url;
    }

    public function setImagenUrl(?string $Imagen_url): self
    {
        $this->Imagen_url = $Imagen_url;

        return $this;
    }

    public function getSupermercado(): ?string
    {
        return $this->Supermercado;
    }

    public function setSupermercado(string $Supermercado): self
    {
        $this->Supermercado = $Supermercado;

        return $this;
    }

    
   
}
