<?php

class Empleado2{
    private string $nombre;
    private string $apellidos;
    private string $sueldo;

    private array $numTelefonos = [];
    public function getNombre(): string{
        return $this->nombre;
    }

    public function setNombre(string $nombre): void{
        $this->nombre = $nombre;
    }

    public function getApellidos(): string{
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): void{
        $this->apellidos = $apellidos;
    }

    public function getSueldo(): string{
        return $this->sueldo;
    }

    public function setSueldo(string $sueldo): void{
        $this->sueldo = $sueldo;
    }

    public function getNumTelefonos(): array{
        return $this->numTelefonos;
    }

    public function setNumTelefonos(array $numTelefonos): void{
        $this->numTelefonos = $numTelefonos;
    }



    public function getNombreCompleto(): string{
        return "<p>" . $this->getNombre() . " " . $this->getApellidos() . "</p>";
    }

    public function debePagarImpuestos(): bool{
        return $this->getSueldo() > 3333;
    }

    public function anyadirTelefono(int $telefono) : void{
        $this->numTelefonos[] = $telefono;
    }

    public function listarTelefonos(): string{
        return implode(', ', $this->numTelefonos);
    }

    public function vaciarTelefonos(): void{
        $this->numTelefonos=[];
    }
}