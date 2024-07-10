<?php

namespace App\Entity;

use App\Repository\MultaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MultaRepository::class)]
class Multa
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
    private ?int $id_Prestamo = null;

    #[ORM\Column]
    private ?int $Monto = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fecha_Emision = null;

    #[ORM\Column(length: 100)]
    private ?string $estado_Pago = null;

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

    public function getIdPrestamo(): ?int
    {
        return $this->id_Prestamo;
    }

    public function setIdPrestamo(int $id_Prestamo): static
    {
        $this->id_Prestamo = $id_Prestamo;

        return $this;
    }

    public function getMonto(): ?int
    {
        return $this->Monto;
    }

    public function setMonto(int $Monto): static
    {
        $this->Monto = $Monto;

        return $this;
    }

    public function getFechaEmision(): ?\DateTimeInterface
    {
        return $this->fecha_Emision;
    }

    public function setFechaEmision(\DateTimeInterface $fecha_Emision): static
    {
        $this->fecha_Emision = $fecha_Emision;

        return $this;
    }

    public function getEstadoPago(): ?string
    {
        return $this->estado_Pago;
    }

    public function setEstadoPago(string $estado_Pago): static
    {
        $this->estado_Pago = $estado_Pago;

        return $this;
    }
}
