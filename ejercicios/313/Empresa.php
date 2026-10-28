<?php
include_once "Trabajador.php";

class Empresa {
    private array $trabajadores = [];

    public function __construct(
        private string $nombre,
        private string $direccion
    ) {}

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getDireccion(): string {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): void {
        $this->direccion = $direccion;
    }

    public function anyadirTrabajador(Trabajador $t): void {
        $this->trabajadores[] = $t;
    }

    public function getTrabajadores(): array {
        return $this->trabajadores;
    }

    public function listarTrabajadores(): string {
        if (empty($this->trabajadores)) {
            return "<p>No hay trabajadores en la empresa.</p>";
        }

        $html = "<ul>";
        foreach ($this->trabajadores as $trabajador) {
            $html .= "<li>" . $trabajador . " - <strong>¿Paga impuestos?</strong>: " . ($trabajador->debePagarImpuestos() ? "Sí" : "No") . "</li>";
        }
        $html .= "</ul>";

        return $html;
    }

    public function getCosteNominas(): float {
        $costeTotal = 0.0;
        foreach ($this->trabajadores as $trabajador) {
            $costeTotal += $trabajador->calcularSueldo();
        }
        return $costeTotal;
    }
}