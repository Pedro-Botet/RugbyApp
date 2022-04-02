<?php

namespace App\Entity;

use App\Repository\JugadorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JugadorRepository::class)
 */
class Jugador
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Equipo::class, inversedBy="jugadores")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idEquipo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellido;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telefono;

    /**
     * @ORM\Column(type="date")
     */
    private $fechaNacimiento;

    /**
     * @ORM\Column(type="integer")
     */
    private $altura;

    /**
     * @ORM\Column(type="integer")
     */
    private $peso;

    /**
     * @ORM\Column(type="array")
     */
    private $placajes = [];

    /**
     * @ORM\Column(type="integer")
     */
    private $golpesCastigo;

    /**
     * @ORM\Column(type="integer")
     */
    private $touch;

    /**
     * @ORM\Column(type="array")
     */
    private $melee = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $chutePalos = [];

    /**
     * @ORM\Column(type="integer")
     */
    private $tarjetaAmarilla;

    /**
     * @ORM\Column(type="integer")
     */
    private $tarjetaRoja;

    /**
     * @ORM\Column(type="integer")
     */
    private $ensayo;

    /**
     * @ORM\Column(type="integer")
     */
    private $minutosJugados;

    /**
     * @ORM\Column(type="boolean")
     */
    private $lesionado;

    /**
     * @ORM\Column(type="boolean")
     */
    private $capitan;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEquipo(): ?Equipo
    {
        return $this->idEquipo;
    }

    public function setIdEquipo(?Equipo $idEquipo): self
    {
        $this->idEquipo = $idEquipo;

        return $this;
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

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

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

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(\DateTimeInterface $fechaNacimiento): self
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    public function getAltura(): ?int
    {
        return $this->altura;
    }

    public function setAltura(int $altura): self
    {
        $this->altura = $altura;

        return $this;
    }

    public function getPeso(): ?int
    {
        return $this->peso;
    }

    public function setPeso(int $peso): self
    {
        $this->peso = $peso;

        return $this;
    }

    public function getPlacajes(): ?array
    {
        return $this->placajes;
    }

    public function setPlacajes(array $placajes): self
    {
        $this->placajes = $placajes;

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

    public function getTouch(): ?int
    {
        return $this->touch;
    }

    public function setTouch(int $touch): self
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

    public function getChutePalos(): ?array
    {
        return $this->chutePalos;
    }

    public function setChutePalos(?array $chutePalos): self
    {
        $this->chutePalos = $chutePalos;

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

    public function getEnsayo(): ?int
    {
        return $this->ensayo;
    }

    public function setEnsayo(int $ensayo): self
    {
        $this->ensayo = $ensayo;

        return $this;
    }

    public function getMinutosJugados(): ?int
    {
        return $this->minutosJugados;
    }

    public function setMinutosJugados(int $minutosJugados): self
    {
        $this->minutosJugados = $minutosJugados;

        return $this;
    }

    public function getLesionado(): ?bool
    {
        return $this->lesionado;
    }

    public function setLesionado(bool $lesionado): self
    {
        $this->lesionado = $lesionado;

        return $this;
    }

    public function getCapitan(): ?bool
    {
        return $this->capitan;
    }

    public function setCapitan(bool $capitan): self
    {
        $this->capitan = $capitan;

        return $this;
    }
}
