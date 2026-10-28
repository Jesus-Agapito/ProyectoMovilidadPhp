<?php

require_once "Vehiculo.php";

class CocheElectrico extends Vehiculo{
    public function __construct(
        string $titulo,
        int $numero,
        float $precio,
        private string $marca,
        private int $plazasMin,
        private int $plazasMax
    )
    {
        parent::__construct($titulo, $numero, $precio);
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): void
    {
        $this->marca = $marca;
    }

    public function getPlazasMin(): int
    {
        return $this->plazasMin;
    }

    public function setPlazasMin(int $plazasMin): void
    {
        $this->plazasMin = $plazasMin;
    }

    public function getPlazasMax(): int
    {
        return $this->plazasMax;
    }

    public function setPlazasMax(int $plazasMax): void
    {
        $this->plazasMax = $plazasMax;
    }



    public function muestraInfoPlazas(): string {
        if ($this->plazasMin === 1 && $this->plazasMax === 1) {
            return "Para un pasajero";
        } elseif ($this->plazasMin === $this->plazasMax) {
            return "Para " . $this->plazasMax . " pasajeros";
        } else {
            return "De " . $this->plazasMin . " a " . $this->plazasMax . " pasajeros";
        }
    }

    public function muestraResumen(): void {
        parent::muestraResumen();
        echo " Marca: " . $this->marca . " | ";
        echo " Plazas: " . $this->muestraInfoPlazas();
    }
}