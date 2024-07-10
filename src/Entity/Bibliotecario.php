<?php

namespace App\Entity;

use App\Repository\BibliotecarioRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibliotecarioRepository::class)]
class Bibliotecario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $Nombre = null;

    #[ORM\Column(length: 150)]
    private ?string $Direccion = null;

    #[ORM\Column]
    private ?int $Telefono = null;

    #[ORM\Column(length: 170)]
    private ?string $Correo_electronico = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Fecha_Contratacion = null;

    #[ORM\Column(length: 35)]
    private ?string $Turno_Trabajo = null;

    #[ORM\Column(length: 150)]
    private ?string $Apellido = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): static
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->Direccion;
    }

    public function setDireccion(string $Direccion): static
    {
        $this->Direccion = $Direccion;

        return $this;
    }

    public function getTelefono(): ?int
    {
        return $this->Telefono;
    }

    public function setTelefono(int $Telefono): static
    {
        $this->Telefono = $Telefono;

        return $this;
    }

    public function getCorreoElectronico(): ?string
    {
        return $this->Correo_electronico;
    }

    public function setCorreoElectronico(string $Correo_electronico): static
    {
        $this->Correo_electronico = $Correo_electronico;

        return $this;
    }

    public function getFechaContratacion(): ?\DateTimeInterface
    {
        return $this->Fecha_Contratacion;
    }

    public function setFechaContratacion(\DateTimeInterface $Fecha_Contratacion): static
    {
        $this->Fecha_Contratacion = $Fecha_Contratacion;

        return $this;
    }

    public function getTurnoTrabajo(): ?string
    {
        return $this->Turno_Trabajo;
    }

    public function setTurnoTrabajo(string $Turno_Trabajo): static
    {
        $this->Turno_Trabajo = $Turno_Trabajo;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->Apellido;
    }

    public function setApellido(string $Apellido): static
    {
        $this->Apellido = $Apellido;

        return $this;
    }
}
