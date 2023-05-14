<?php

namespace App\Entity;

use App\Repository\ProductosListaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductosListaRepository::class)]
class ProductosLista
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'productosListas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?listas $id_lista = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?productos $id_producto = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdLista(): ?listas
    {
        return $this->id_lista;
    }

    public function setIdLista(?listas $id_lista): self
    {
        $this->id_lista = $id_lista;

        return $this;
    }

    public function getIdProducto(): ?productos
    {
        return $this->id_producto;
    }

    public function setIdProducto(productos $id_producto): self
    {
        $this->id_producto = $id_producto;

        return $this;
    }
}
