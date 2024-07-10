<?php

namespace App\Entity;

use App\Repository\MaterialRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaterialRepository::class)]
class Material
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 170)]
    private ?string $Titulo = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $Autor = null;

    #[ORM\Column(length: 170, nullable: true)]
    private ?string $Editorial = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Fecha_Publicacion = null;

    #[ORM\Column(length: 170, nullable: true)]
    private ?string $Nro_Ejemplares = null;

    #[ORM\Column(length: 130)]
    private ?string $Ubicacion = null;

    #[ORM\Column(length: 160)]
    private ?string $Tipo = null;

    #[ORM\Column(length: 140)]
    private ?string $Categoria = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->Titulo;
    }

    public function setTitulo(string $Titulo): static
    {
        $this->Titulo = $Titulo;

        return $this;
    }

    public function getAutor(): ?string
    {
        return $this->Autor;
    }

    public function setAutor(?string $Autor): static
    {
        $this->Autor = $Autor;

        return $this;
    }

    public function getEditorial(): ?string
    {
        return $this->Editorial;
    }

    public function setEditorial(?string $Editorial): static
    {
        $this->Editorial = $Editorial;

        return $this;
    }

    public function getFechaPublicacion(): ?\DateTimeInterface
    {
        return $this->Fecha_Publicacion;
    }

    public function setFechaPublicacion(\DateTimeInterface $Fecha_Publicacion): static
    {
        $this->Fecha_Publicacion = $Fecha_Publicacion;

        return $this;
    }

    public function getNroEjemplares(): ?string
    {
        return $this->Nro_Ejemplares;
    }

    public function setNroEjemplares(?string $Nro_Ejemplares): static
    {
        $this->Nro_Ejemplares = $Nro_Ejemplares;

        return $this;
    }

    public function getUbicacion(): ?string
    {
        return $this->Ubicacion;
    }

    public function setUbicacion(string $Ubicacion): static
    {
        $this->Ubicacion = $Ubicacion;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->Tipo;
    }

    public function setTipo(string $Tipo): static
    {
        $this->Tipo = $Tipo;

        return $this;
    }

    public function getCategoria(): ?string
    {
        return $this->Categoria;
    }

    public function setCategoria(string $Categoria): static
    {
        $this->Categoria = $Categoria;

        return $this;
    }
}
