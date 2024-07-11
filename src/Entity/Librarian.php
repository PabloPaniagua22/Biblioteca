<?php

namespace App\Entity;

use App\Repository\LibrarianRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LibrarianRepository::class)]
class Librarian
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120)]
    private ?string $Nombre = null;

    #[ORM\Column(length: 100)]
    private ?string $Apellido = null;

    #[ORM\Column(length: 200)]
    private ?string $Direccion = null;

    #[ORM\Column(length: 70)]
    private ?string $Telefono = null;

    #[ORM\Column(length: 255)]
    private ?string $Correo_Electronico = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Fecha_Contratacion = null;

    #[ORM\Column(length: 60)]
    private ?string $turno_Trabajo = null;

    #[ORM\OneToMany(targetEntity: Prestamos::class, mappedBy: 'id_Bibliotecario', orphanRemoval: true)]
    private Collection $Prestamo;

    #[ORM\OneToMany(targetEntity: Multas::class, mappedBy: 'id_Bibliotecario', orphanRemoval: true)]
    private Collection $Multa;

    public function __construct()
    {
        $this->Prestamo = new ArrayCollection();
        $this->Multa = new ArrayCollection();
    }

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

    public function getApellido(): ?string
    {
        return $this->Apellido;
    }

    public function setApellido(string $Apellido): static
    {
        $this->Apellido = $Apellido;

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

    public function getTelefono(): ?string
    {
        return $this->Telefono;
    }

    public function setTelefono(string $Telefono): static
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
        return $this->turno_Trabajo;
    }

    public function setTurnoTrabajo(string $turno_Trabajo): static
    {
        $this->turno_Trabajo = $turno_Trabajo;

        return $this;
    }

    /**
     * @return Collection<int, Prestamos>
     */
    public function getPrestamo(): Collection
    {
        return $this->Prestamo;
    }

    public function addPrestamo(Prestamos $prestamo): static
    {
        if (!$this->Prestamo->contains($prestamo)) {
            $this->Prestamo->add($prestamo);
            $prestamo->setIdBibliotecario($this);
        }

        return $this;
    }

    public function removePrestamo(Prestamos $prestamo): static
    {
        if ($this->Prestamo->removeElement($prestamo)) {
            // set the owning side to null (unless already changed)
            if ($prestamo->getIdBibliotecario() === $this) {
                $prestamo->setIdBibliotecario(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Multas>
     */
    public function getMulta(): Collection
    {
        return $this->Multa;
    }

    public function addMultum(Multas $multum): static
    {
        if (!$this->Multa->contains($multum)) {
            $this->Multa->add($multum);
            $multum->setIdBibliotecario($this);
        }

        return $this;
    }

    public function removeMultum(Multas $multum): static
    {
        if ($this->Multa->removeElement($multum)) {
            // set the owning side to null (unless already changed)
            if ($multum->getIdBibliotecario() === $this) {
                $multum->setIdBibliotecario(null);
            }
        }

        return $this;
    }
}
