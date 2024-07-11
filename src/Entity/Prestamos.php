<?php

namespace App\Entity;

use App\Repository\PrestamosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrestamosRepository::class)]
class Prestamos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Fecha_Prestamo = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Fecha_Devolucion = null;

    #[ORM\Column(length: 40)]
    private ?string $Estado_Prestamo = null;

    #[ORM\ManyToOne(inversedBy: 'Prestamos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $id_Usuario = null;

    #[ORM\ManyToOne(inversedBy: 'Prestamo')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Librarian $id_Bibliotecario = null;

    #[ORM\ManyToOne(inversedBy: 'Prestamo')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Materiales $Id_Material = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaPrestamo(): ?\DateTimeInterface
    {
        return $this->Fecha_Prestamo;
    }

    public function setFechaPrestamo(\DateTimeInterface $Fecha_Prestamo): static
    {
        $this->Fecha_Prestamo = $Fecha_Prestamo;

        return $this;
    }

    public function getFechaDevolucion(): ?\DateTimeInterface
    {
        return $this->Fecha_Devolucion;
    }

    public function setFechaDevolucion(\DateTimeInterface $Fecha_Devolucion): static
    {
        $this->Fecha_Devolucion = $Fecha_Devolucion;

        return $this;
    }

    public function getEstadoPrestamo(): ?string
    {
        return $this->Estado_Prestamo;
    }

    public function setEstadoPrestamo(string $Estado_Prestamo): static
    {
        $this->Estado_Prestamo = $Estado_Prestamo;

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

    public function getIdMaterial(): ?Materiales
    {
        return $this->Id_Material;
    }

    public function setIdMaterial(?Materiales $Id_Material): static
    {
        $this->Id_Material = $Id_Material;

        return $this;
    }
}
