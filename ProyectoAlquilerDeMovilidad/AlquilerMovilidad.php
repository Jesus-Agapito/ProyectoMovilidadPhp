<?php

require_once 'Vehiculo.php';
require_once 'Patinete.php';
require_once 'CocheElectrico.php';
require_once 'BicicletaElectrica.php';
require_once 'Cliente.php';

class AlquilerMovilidad {
    private array $vehiculos = [];
    private array $clientes = []; // Socios
    private int $contadorVehiculos = 1;
    private int $contadorClientes = 1;

    public function __construct(public string $nombreUbicacion) {}

    private function incluirVehiculo(Vehiculo $vehiculo): void {
        $this->vehiculos[] = $vehiculo;
    }

    public function incluirCocheElectrico(string $titulo, float $precio, string $marcaModelo, int $plazasMin, int $plazasMax): void {
        $nuevoCoche = new CocheElectrico($titulo, $this->contadorVehiculos++, $precio, $marcaModelo, $plazasMin, $plazasMax);
        $this->incluirVehiculo($nuevoCoche);
    }

    public function incluirBicicletaElectrica(string $titulo, float $precio, int $marcha, string $tipo): void {
        $nuevaBici = new BicicletaElectrica($titulo, $this->contadorVehiculos++, $precio, $marcha, $tipo);
        $this->incluirVehiculo($nuevaBici);
    }

    public function incluirPatinete(string $titulo, float $precio, int $autonomiaKm): void {
        $nuevoPatinete = new Patinete($titulo, $this->contadorVehiculos++, $precio, $autonomiaKm);
        $this->incluirVehiculo($nuevoPatinete);
    }

    public function listarVehiculos(): void {
        echo "Lista de Vehículos (" . $this->nombreUbicacion . ")";
        foreach ($this->vehiculos as $vehiculo) {
            echo "<p>";
            $vehiculo->muestraResumen();
            echo "</p>";
        }
        echo "<hr>";
    }

    public function incluirSocio(string $nombre, int $maxAlquilerConcurrente = 3): void {
        $this->clientes[] = new Cliente($nombre, $this->contadorClientes++, $maxAlquilerConcurrente);
    }

    public function alquilarClienteVehiculo(int $numSocio, int $numVehiculo): void {
        $clienteEncontrado = null;
        foreach ($this->clientes as $cliente) {
            if ($cliente->getNumero() === $numSocio) {
                $clienteEncontrado = $cliente;
                break;
            }
        }

        $vehiculoEncontrado = null;
        foreach ($this->vehiculos as $vehiculo) {
            if ($vehiculo->getNumero() === $numVehiculo) {
                $vehiculoEncontrado = $vehiculo;
                break;
            }
        }

        if ($clienteEncontrado && $vehiculoEncontrado) {
            $clienteEncontrado->alquilar($vehiculoEncontrado);
        } else {
            echo "<p>Error: Socio o vehículo no encontrado.</p>";
        }
    }

    public function listarSocios(): void {
        echo "<hr>";
        echo "Lista de Socios";
        foreach ($this->clientes as $cliente) {
            $cliente->muestraResumen();
            $cliente->listaAlquileres();
            echo "<hr>";
        }
    }

    public function getVehiculos(): array {
        return $this->vehiculos;
    }

    public function getClientes(): array {
        return $this->clientes;
    }
}