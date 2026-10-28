<?php

require_once 'Resumible.php';

abstract class Vehiculo implements Resumible {
    private static float $IVA = 0.21;

    public function __construct(
        public string $titulo,
        private int $numero,
        private float $precio
    ) {}

    public function getNumero(): int {
        return $this->numero;
    }

    public function getPrecio(): float {
        return $this->precio;
    }

    public function getPrecioConIVA(): float {
        return $this->precio * (1 + self::$IVA);
    }

    public function muestraResumen(): void {
        echo "Título: " . $this->titulo . " | ";
        echo "Número: " . $this->numero . " | ";
        echo "Precio base: " . $this->precio . " | ";
        echo "Precio con IVA: " . $this->getPrecioConIVA() . " | ";
    }
}