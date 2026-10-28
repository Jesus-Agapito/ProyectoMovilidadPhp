<?php
include_once "Trabajador.php";

class Empleado extends Trabajador {
    public function __construct(
        string $nombre,
        string $apellidos,
        int $edad,
        private int $horasTrabajadas = 0,
        private float $precioPorHora = 0.0
    ) {
        parent::__construct($nombre, $apellidos, $edad);
    }

    public function getHorasTrabajadas(): int {
        return $this->horasTrabajadas;
    }

    public function setHorasTrabajadas(int $horasTrabajadas): void {
        $this->horasTrabajadas = $horasTrabajadas;
    }

    public function getPrecioPorHora(): float {
        return $this->precioPorHora;
    }

    public function setPrecioPorHora(float $precioPorHora): void {
        $this->precioPorHora = $precioPorHora;
    }

    public function calcularSueldo(): float {
        return $this->horasTrabajadas * $this->precioPorHora;
    }
}