<?php

namespace App\Entity;

use App\Repository\PrestamoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrestamoRepository::class)]
class Prestamo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_Bibliotecario = null;

    #[ORM\Column]
    private ?int $id_Usuario = null;

    #[ORM\Column]
    private ?int $id_Material = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha_Prestamo = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha_Devolucion = null;

    #[ORM\Column(length: 40)]
    private ?string $estado_Prestamo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBibliotecario(): ?int
    {
        return $this->id_Bibliotecario;
    }

    public function setIdBibliotecario(int $id_Bibliotecario): static
    {
        $this->id_Bibliotecario = $id_Bibliotecario;

        return $this;
    }

    public function getIdUsuario(): ?int
    {
        return $this->id_Usuario;
    }

    public function setIdUsuario(int $id_Usuario): static
    {
        $this->id_Usuario = $id_Usuario;

        return $this;
    }

    public function getIdMaterial(): ?int
    {
        return $this->id_Material;
    }

    public function setIdMaterial(int $id_Material): static
    {
        $this->id_Material = $id_Material;

        return $this;
    }

    public function getFechaPrestamo(): ?\DateTimeInterface
    {
        return $this->fecha_Prestamo;
    }

    public function setFechaPrestamo(\DateTimeInterface $fecha_Prestamo): static
    {
        $this->fecha_Prestamo = $fecha_Prestamo;

        return $this;
    }

    public function getFechaDevolucion(): ?\DateTimeInterface
    {
        return $this->fecha_Devolucion;
    }

    public function setFechaDevolucion(\DateTimeInterface $fecha_Devolucion): static
    {
        $this->fecha_Devolucion = $fecha_Devolucion;

        return $this;
    }

    public function getEstadoPrestamo(): ?string
    {
        return $this->estado_Prestamo;
    }

    public function setEstadoPrestamo(string $estado_Prestamo): static
    {
        $this->estado_Prestamo = $estado_Prestamo;

        return $this;
    }
}
