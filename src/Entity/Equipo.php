<?php

namespace App\Entity;

use App\Repository\EquipoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipoRepository::class)
 */
class Equipo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $direccion;

    /**
     * @ORM\OneToMany(targetEntity=Jugador::class, mappedBy="idEquipo", orphanRemoval=true)
     */
    private $jugadores;

    /**
     * @ORM\OneToMany(targetEntity=Staff::class, mappedBy="idEquipo", orphanRemoval=true)
     */
    private $staff;

    /**
     * @ORM\Column(type="array")
     */
    private $touch = [];

    /**
     * @ORM\Column(type="array")
     */
    private $melee = [];

    /**
     * @ORM\Column(type="array")
     */
    private $chutesAPalos = [];

    /**
     * @ORM\Column(type="integer")
     */
    private $ensayos;

    /**
     * @ORM\Column(type="integer")
     */
    private $puntosFavor;

    /**
     * @ORM\Column(type="integer")
     */
    private $puntosContra;

    /**
     * @ORM\Column(type="integer")
     */
    private $golpesCastigo;

    /**
     * @ORM\Column(type="integer")
     */
    private $tarjetaAmarilla;

    /**
     * @ORM\Column(type="integer")
     */
    private $tarjetaRoja;

    public function __construct()
    {
        $this->jugadores = new ArrayCollection();
        $this->staff = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * @return Collection<int, Jugador>
     */
    public function getJugadores(): Collection
    {
        return $this->jugadores;
    }

    public function addJugadore(Jugador $jugadore): self
    {
        if (!$this->jugadores->contains($jugadore)) {
            $this->jugadores[] = $jugadore;
            $jugadore->setIdEquipo($this);
        }

        return $this;
    }

    public function removeJugadore(Jugador $jugadore): self
    {
        if ($this->jugadores->removeElement($jugadore)) {
            // set the owning side to null (unless already changed)
            if ($jugadore->getIdEquipo() === $this) {
                $jugadore->setIdEquipo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Staff>
     */
    public function getStaff(): Collection
    {
        return $this->staff;
    }

    public function addStaff(Staff $staff): self
    {
        if (!$this->staff->contains($staff)) {
            $this->staff[] = $staff;
            $staff->setIdEquipo($this);
        }

        return $this;
    }

    public function removeStaff(Staff $staff): self
    {
        if ($this->staff->removeElement($staff)) {
            // set the owning side to null (unless already changed)
            if ($staff->getIdEquipo() === $this) {
                $staff->setIdEquipo(null);
            }
        }

        return $this;
    }

    public function getTouch(): ?array
    {
        return $this->touch;
    }

    public function setTouch(array $touch): self
    {
        $this->touch = $touch;

        return $this;
    }

    public function getMelee(): ?array
    {
        return $this->melee;
    }

    public function setMelee(array $melee): self
    {
        $this->melee = $melee;

        return $this;
    }

    public function getChutesAPalos(): ?array
    {
        return $this->chutesAPalos;
    }

    public function setChutesAPalos(array $chutesAPalos): self
    {
        $this->chutesAPalos = $chutesAPalos;

        return $this;
    }

    public function getEnsayos(): ?int
    {
        return $this->ensayos;
    }

    public function setEnsayos(int $ensayos): self
    {
        $this->ensayos = $ensayos;

        return $this;
    }

    public function getPuntosFavor(): ?int
    {
        return $this->puntosFavor;
    }

    public function setPuntosFavor(int $puntosFavor): self
    {
        $this->puntosFavor = $puntosFavor;

        return $this;
    }

    public function getPuntosContra(): ?int
    {
        return $this->puntosContra;
    }

    public function setPuntosContra(int $puntosContra): self
    {
        $this->puntosContra = $puntosContra;

        return $this;
    }

    public function getGolpesCastigo(): ?int
    {
        return $this->golpesCastigo;
    }

    public function setGolpesCastigo(int $golpesCastigo): self
    {
        $this->golpesCastigo = $golpesCastigo;

        return $this;
    }

    public function getTarjetaAmarilla(): ?int
    {
        return $this->tarjetaAmarilla;
    }

    public function setTarjetaAmarilla(int $tarjetaAmarilla): self
    {
        $this->tarjetaAmarilla = $tarjetaAmarilla;

        return $this;
    }

    public function getTarjetaRoja(): ?int
    {
        return $this->tarjetaRoja;
    }

    public function setTarjetaRoja(int $tarjetaRoja): self
    {
        $this->tarjetaRoja = $tarjetaRoja;

        return $this;
    }
}
