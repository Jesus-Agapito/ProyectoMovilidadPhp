<?php
include_once "Trabajador.php";

class Gerente extends Trabajador {
    public function __construct(
        string $nombre,
        string $apellidos,
        int $edad,
        private float $salario = 1000.0
    ) {
        parent::__construct($nombre, $apellidos, $edad);
    }

    public function getSalario(): float {
        return $this->salario;
    }

    public function setSalario(float $salario): void {
        $this->salario = $salario;
    }

    public function calcularSueldo(): float {
        return $this->salario + ($this->salario * $this->edad / 100);
    }
}