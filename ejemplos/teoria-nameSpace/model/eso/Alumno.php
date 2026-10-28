<?php
namespace App\Model\Eso;
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
        return "Alumno ". $this->nombre  . " de la ESO con dni ". $this->dni;
    }
}