<?php
namespace Dwes\AlquilerMovilidad;

require_once "Vehiculo.php";

class Patinete extends Vehiculo {
    public function __construct(
        string $titulo,
        int $numero,
        float $precio,
        public int $autonomiaKm,
        public int $velocidadMaxKmH = 25
    ) {
        parent::__construct($titulo, $numero, $precio);
    }

    public function muestraResumen(): void {
        parent::muestraResumen();
        echo "Autonomía: " . $this->autonomiaKm . " km";
        echo "Velocidad máxima: " . $this->velocidadMaxKmH . " km/h";
    }
}