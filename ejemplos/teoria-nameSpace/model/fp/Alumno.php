<?php
namespace App\Model\Fp;

class Alumno{

    function __construct(
        private string $dni,
        private string $nombre
    )
    {}

    public function getDni(): string
    {
        return $this->dni;
    }

    public function setDni(string $dni): void
    {
        $this->dni = $dni;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function muestra() : string{
        return "Alumno sexy super guay ". $this->nombre  . " de FP con dni ". $this->dni;
    }
}