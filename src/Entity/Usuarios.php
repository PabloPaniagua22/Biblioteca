<?php

namespace App\Entity;

use App\Repository\UsuariosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuariosRepository::class)]
class Usuarios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 85)]
    private ?string $Nombres = null;

    #[ORM\Column(length: 60)]
    private ?string $Apellido = null;

    #[ORM\Column]
    private ?int $DNI = null;

    #[ORM\Column(length: 100)]
    private ?string $Direccion = null;

    #[ORM\Column]
    private ?int $Telefono = null;

    #[ORM\Column(length: 255)]
    private ?string $Correo_Electronico = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombres(): ?string
    {
        return $this->Nombres;
    }

    public function setNombres(string $Nombres): static
    {
        $this->Nombres = $Nombres;

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

    public function getDNI(): ?int
    {
        return $this->DNI;
    }

    public function setDNI(int $DNI): static
    {
        $this->DNI = $DNI;

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
        return $this->Correo_Electronico;
    }

    public function setCorreoElectronico(string $Correo_Electronico): static
    {
        $this->Correo_Electronico = $Correo_Electronico;

        return $this;
    }
}
