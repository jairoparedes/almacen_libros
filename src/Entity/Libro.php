<?php

namespace App\Entity;

use App\Repository\LibroRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LibroRepository::class)]
class Libro
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $isbn = null;

    #[ORM\Column(length: 255)]
    private ?string $titulo = null;

    #[ORM\Column]
    private ?int $numero_paginas = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descripcion = null;

    #[ORM\Column(length: 255)]
    private ?string $portada = null;

    #[ORM\Column]
    private ?int $categoria = null;

    #[ORM\ManyToOne(inversedBy: 'cat')]
    private ?CategoriaLibro $categoria_relacion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getNumeroPaginas(): ?int
    {
        return $this->numero_paginas;
    }

    public function setNumeroPaginas(int $numero_paginas): self
    {
        $this->numero_paginas = $numero_paginas;

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

    public function getPortada(): ?string
    {
        return $this->portada;
    }

    public function setPortada(string $portada): self
    {
        $this->portada = $portada;

        return $this;
    }

    public function getCategoria(): ?int
    {
        return $this->categoria;
    }

    public function setCategoria(int $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getCategoriaRelacion(): ?CategoriaLibro
    {
        return $this->categoria_relacion;
    }

    public function setCategoriaRelacion(?CategoriaLibro $categoria_relacion): self
    {
        $this->categoria_relacion = $categoria_relacion;

        return $this;
    }
}
