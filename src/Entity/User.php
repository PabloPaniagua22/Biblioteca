<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120)]
    private ?string $Nombre = null;

    #[ORM\Column(length: 100)]
    private ?string $Apellido = null;

    #[ORM\Column(length: 50)]
    private ?string $DNI = null;

    #[ORM\Column(length: 200)]
    private ?string $Direccion = null;

    #[ORM\Column(length: 255)]
    private ?string $Correo_Electronico = null;

    #[ORM\OneToMany(targetEntity: Prestamos::class, mappedBy: 'id_Usuario', orphanRemoval: true)]
    private Collection $Prestamos;

    #[ORM\OneToMany(targetEntity: Multas::class, mappedBy: 'id_Usuario', orphanRemoval: true)]
    private Collection $Multa;

    public function __construct()
    {
        $this->Prestamos = new ArrayCollection();
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

    public function getDNI(): ?string
    {
        return $this->DNI;
    }

    public function setDNI(string $DNI): static
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

    public function getCorreoElectronico(): ?string
    {
        return $this->Correo_Electronico;
    }

    public function setCorreoElectronico(string $Correo_Electronico): static
    {
        $this->Correo_Electronico = $Correo_Electronico;

        return $this;
    }

    /**
     * @return Collection<int, Prestamos>
     */
    public function getPrestamos(): Collection
    {
        return $this->Prestamos;
    }

    public function addPrestamo(Prestamos $prestamo): static
    {
        if (!$this->Prestamos->contains($prestamo)) {
            $this->Prestamos->add($prestamo);
            $prestamo->setIdUsuario($this);
        }

        return $this;
    }

    public function removePrestamo(Prestamos $prestamo): static
    {
        if ($this->Prestamos->removeElement($prestamo)) {
            // set the owning side to null (unless already changed)
            if ($prestamo->getIdUsuario() === $this) {
                $prestamo->setIdUsuario(null);
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
            $multum->setIdUsuario($this);
        }

        return $this;
    }

    public function removeMultum(Multas $multum): static
    {
        if ($this->Multa->removeElement($multum)) {
            // set the owning side to null (unless already changed)
            if ($multum->getIdUsuario() === $this) {
                $multum->setIdUsuario(null);
            }
        }

        return $this;
    }
}
