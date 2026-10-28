<?php
include "Persona.php";

class Empleado extends Persona {
    private static float $sueldoTope = 3333;
    private array $telefonos = [];

    public function __construct(string $nombre, string $apellidos, private float $sueldo = 1000) {
        parent::__construct($nombre, $apellidos);
    }

    public function getSueldo(): float {
        return $this->sueldo;
    }

    public function setSueldo(float $sueldo): void {
        $this->sueldo = $sueldo;
    }

    public static function getSueldoTope(): float {
        return self::$sueldoTope;
    }

    public static function setSueldoTope(float $sueldoTope): void {
        self::$sueldoTope = $sueldoTope;
    }

    public function debePagarImpuestos(): bool {
        return $this->sueldo > self::$sueldoTope;
    }

    public function anyadirTelefono(int $telefono): void {
        $this->telefonos[] = $telefono;
    }

    public function listarTelefonos(): string {
        return implode(", ", $this->telefonos);
    }

    public function vaciarTelefonos(): void {
        $this->telefonos = [];
    }

    public function getTelefonos(): array {
        return $this->telefonos;
    }

    public static function toHtml(Persona $p): string {
        $html = "<p><strong>Nombre completo:</strong> " . $p->getNombreCompleto() . "</p>";

        if ($p instanceof Empleado) {
            $html .= "<p><strong>Sueldo:</strong> " . $p->getSueldo() . "€</p>";
            $html .= "<p>Teléfonos:</p>";
            $html .= "<ul>";
            foreach ($p->getTelefonos() as $telefono) {
                $html .= "<li>{$telefono}</li>";
            }
            $html .= "</ul>";
        }

        return $html;
    }
}