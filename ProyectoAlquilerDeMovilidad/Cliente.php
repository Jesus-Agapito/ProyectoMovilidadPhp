<?php
namespace Dwes\AlquilerMovilidad;

require_once 'Vehiculo.php';

class Cliente {
    private array $vehiculosAlquilados = [];
    private int $numVehiculosAlquilados = 0;

    public function __construct(
        public string $nombre,
        private int $numero,
        public int $maxAlquilerConcurrente = 3
    ) {}

    public function getNumero(): int {
        return $this->numero;
    }

    public function setNumero(int $numero): void {
        $this->numero = $numero;
    }

    public function getNumVehiculosAlquilados(): int {
        return $this->numVehiculosAlquilados;
    }

    public function alquilarVehiculo(Vehiculo $vehiculo): bool {
        if (count($this->vehiculosAlquilados) < $this->maxAlquilerConcurrente) {
            $this->vehiculosAlquilados[] = $vehiculo;
            $this->numVehiculosAlquilados++;
            return true;
        }
        return false;
    }

    public function tieneAlquilado(Vehiculo $vehiculoAlquilar): bool {
        return in_array($vehiculoAlquilar, $this->vehiculosAlquilados, true);
    }

    public function alquilar(Vehiculo $vehiculoAlquilar): bool {
        if ($this->tieneAlquilado($vehiculoAlquilar)) {
            echo "<p>El cliente " . $this->nombre . " ya tiene alquilado el vehículo número " . $vehiculoAlquilar->getNumero() . ".</p>";
            return false;
        }

        if (count($this->vehiculosAlquilados) >= $this->maxAlquilerConcurrente) {
            echo "<p>El cliente " . $this->nombre . " ha superado el cupo máximo de alquileres concurrentes (" . $this->maxAlquilerConcurrente . ").</p>";
            return false;
        }

        $this->vehiculosAlquilados[] = $vehiculoAlquilar;
        $this->numVehiculosAlquilados++;

        echo "<p>Vehículo " . $vehiculoAlquilar->titulo . " alquilado por " . $this->nombre . "</p>";
        return true;
    }

    public function devolver(int $numVehiculo): bool {
        foreach ($this->vehiculosAlquilados as $indice => $vehiculo) {
            if ($vehiculo->getNumero() === $numVehiculo) {
                array_splice($this->vehiculosAlquilados, $indice, 1);
                echo "<p>El vehículo con número " . $numVehiculo . " ha sido devuelto por " . $this->nombre . ".</p>";
                return true;
            }
        }

        echo "<p>Aviso: El cliente " . $this->nombre . " no tiene ningún vehículo alquilado con el número " . $numVehiculo . ".</p>";
        return false;
    }

    public function listaAlquileres(): void {
        $cantidadActivos = count($this->vehiculosAlquilados);
        echo "<p>El cliente " . $this->nombre . " tiene actualmente " . $cantidadActivos . " alquilado/s:</p>";

        if ($cantidadActivos > 0) {
            echo "<ul>";
            foreach ($this->vehiculosAlquilados as $vehiculo) {
                echo "<li>";
                $vehiculo->muestraResumen();
                echo "</li>";
            }
            echo "</ul>";
        }
    }

    public function muestraResumen(): void {
        echo "<p>Nombre: <strong>" . $this->nombre . "</strong></p>";
        echo "<p>Cantidad de alquileres activos: " . count($this->vehiculosAlquilados) . "</p>";
        echo "<p>Total histórico de alquileres: " . $this->numVehiculosAlquilados . "</p>";
    }
}