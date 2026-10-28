<?php
abstract class Persona {
    public function __construct(
        protected string $nombre,
        protected string $apellidos,
        protected int $edad
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

    public function getEdad(): int {
        return $this->edad;
    }

    public function setEdad(int $edad): void {
        $this->edad = $edad;
    }

    public function getNombreCompleto(): string {
        return "{$this->nombre} {$this->apellidos}";
    }

    abstract public static function toHtml(Persona $p): string;

    public function __toString(): string {
        return "Nombre: {$this->nombre}, Apellidos: {$this->apellidos}, Edad: {$this->edad}";
    }
}