<?php
include_once "Persona.php";

abstract class Trabajador extends Persona {
    private static float $sueldoTope = 3333;
    protected array $telefonos = [];

    public function __construct(string $nombre, string $apellidos, int $edad) {
        parent::__construct($nombre, $apellidos, $edad);
    }

    public static function getSueldoTope(): float {
        return self::$sueldoTope;
    }

    public static function setSueldoTope(float $sueldoTope): void {
        self::$sueldoTope = $sueldoTope;
    }

    abstract public function calcularSueldo(): float;

    public function debePagarImpuestos(): bool {
        return $this->calcularSueldo() > self::$sueldoTope && $this->edad > 21;
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

        if ($p instanceof Trabajador) {
            $html .= "<p><strong>Sueldo:</strong> " . $p->calcularSueldo() . "€</p>";
            $html .= "<p>Teléfonos:</p>";
            $html .= "<ul>";
            foreach ($p->getTelefonos() as $telefono) {
                $html .= "<li>{$telefono}</li>";
            }
            $html .= "</ul>";
        }

        return $html;
    }

    public function __toString(): string {
        $telefonosStr = $this->listarTelefonos();
        return parent::__toString() . ", Sueldo: {$this->calcularSueldo()}€, Teléfonos: [{$telefonosStr}]";
    }
}