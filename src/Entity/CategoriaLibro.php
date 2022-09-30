<?php

namespace App\Entity;

use App\Repository\CategoriaLibroRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriaLibroRepository::class)]
class CategoriaLibro
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre_categoria = null;

    #[ORM\OneToMany(mappedBy: 'categoria_relacion', targetEntity: Libro::class)]
    private Collection $cat;

    public function __construct()
    {
        $this->cat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreCategoria(): ?string
    {
        return $this->nombre_categoria;
    }

    public function setNombreCategoria(string $nombre_categoria): self
    {
        $this->nombre_categoria = $nombre_categoria;

        return $this;
    }

    /**
     * @return Collection<int, Libro>
     */
    public function getCat(): Collection
    {
        return $this->cat;
    }

    public function addCat(Libro $cat): self
    {
        if (!$this->cat->contains($cat)) {
            $this->cat->add($cat);
            $cat->setCategoriaRelacion($this);
        }

        return $this;
    }

    public function removeCat(Libro $cat): self
    {
        if ($this->cat->removeElement($cat)) {
            // set the owning side to null (unless already changed)
            if ($cat->getCategoriaRelacion() === $this) {
                $cat->setCategoriaRelacion(null);
            }
        }

        return $this;
    }
}
