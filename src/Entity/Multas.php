<?php

namespace App\Entity;

use App\Repository\MultasRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MultasRepository::class)]
class Multas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $Monto = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Fecha_Emision = null;

    #[ORM\Column(length: 40)]
    private ?string $Estado_Pago = null;

    #[ORM\ManyToOne(inversedBy: 'Multa')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $id_Usuario = null;

    #[ORM\ManyToOne(inversedBy: 'Multa')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Librarian $id_Bibliotecario = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMonto(): ?string
    {
        return $this->Monto;
    }

    public function setMonto(string $Monto): static
    {
        $this->Monto = $Monto;

        return $this;
    }

    public function getFechaEmision(): ?\DateTimeInterface
    {
        return $this->Fecha_Emision;
    }

    public function setFechaEmision(\DateTimeInterface $Fecha_Emision): static
    {
        $this->Fecha_Emision = $Fecha_Emision;

        return $this;
    }

    public function getEstadoPago(): ?string
    {
        return $this->Estado_Pago;
    }

    public function setEstadoPago(string $Estado_Pago): static
    {
        $this->Estado_Pago = $Estado_Pago;

        return $this;
    }

    public function getIdUsuario(): ?User
    {
        return $this->id_Usuario;
    }

    public function setIdUsuario(?User $id_Usuario): static
    {
        $this->id_Usuario = $id_Usuario;

        return $this;
    }

    public function getIdBibliotecario(): ?Librarian
    {
        return $this->id_Bibliotecario;
    }

    public function setIdBibliotecario(?Librarian $id_Bibliotecario): static
    {
        $this->id_Bibliotecario = $id_Bibliotecario;

        return $this;
    }
}
