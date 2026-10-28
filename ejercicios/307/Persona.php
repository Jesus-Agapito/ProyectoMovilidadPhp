<?php
class Persona {

    public function __construct(
        protected string $nombre,
        protected string $apellidos
    ) {}

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getApellidos(): string {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): void {
        $this->apellidos = $apellidos;
    }

    public function getNombreCompleto(): string {
        return "{$this->nombre} {$this->apellidos}";
    }
}