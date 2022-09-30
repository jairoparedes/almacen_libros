<?php

namespace App\Entity;

use App\Repository\AutorLibroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AutorLibroRepository::class)]
class AutorLibro
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $autor_id = null;

    #[ORM\Column]
    private ?int $libro_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAutorId(): ?int
    {
        return $this->autor_id;
    }

    public function setAutorId(int $autor_id): self
    {
        $this->autor_id = $autor_id;

        return $this;
    }

    public function getLibroId(): ?int
    {
        return $this->libro_id;
    }

    public function setLibroId(int $libro_id): self
    {
        $this->libro_id = $libro_id;

        return $this;
    }
}
