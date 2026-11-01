<?php
namespace Dwes\AlquilerMovilidad;

require_once 'Vehiculo.php';
require_once 'Patinete.php';
require_once 'CocheElectrico.php';
require_once 'BicicletaElectrica.php';
require_once 'Cliente.php';
require_once 'excepciones/AlquilerMovilidadException.php';
require_once 'excepciones/ClienteNoEncontradoException.php';
require_once 'excepciones/VehiculoNoEncontradoException.php';
require_once 'excepciones/VehiculoYaAlquiladoException.php';
require_once 'excepciones/CupoSuperadoException.php';

use Dwes\AlquilerMovilidad\Util\AlquilerMovilidadException;
use Dwes\AlquilerMovilidad\Util\ClienteNoEncontradoException;
use Dwes\AlquilerMovilidad\Util\VehiculoNoEncontradoException;
use Dwes\AlquilerMovilidad\Util\VehiculoYaAlquiladoException;
use Dwes\AlquilerMovilidad\Util\CupoSuperadoException;

class AlquilerMovilidad {
    private array $vehiculos = [];
    private array $clientes = [];
    private int $contadorVehiculos = 1;
    private int $contadorClientes = 1;

    private int $numVehiculosAlquilados = 0;
    private int $numTotalAlquileres = 0;

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

    public function alquilarClienteVehiculo(int $numSocio, int $numVehiculo): self {
        try {
            $clienteEncontrado = null;
            foreach ($this->clientes as $cliente) {
                if ($cliente->getNumero() === $numSocio) {
                    $clienteEncontrado = $cliente;
                    break;
                }
            }

            if (!$clienteEncontrado) {
                throw new ClienteNoEncontradoException("Error: Socio con número " . $numSocio . " no encontrado.");
            }

            $vehiculoEncontrado = null;
            foreach ($this->vehiculos as $vehiculo) {
                if ($vehiculo->getNumero() === $numVehiculo) {
                    $vehiculoEncontrado = $vehiculo;
                    break;
                }
            }

            if (!$vehiculoEncontrado) {
                throw new VehiculoNoEncontradoException("Error: Vehículo con número " . $numVehiculo . " no encontrado.");
            }

            $clienteEncontrado->alquilar($vehiculoEncontrado);

            $this->numVehiculosAlquilados++;
            $this->numTotalAlquileres++;

        } catch (AlquilerMovilidadException $e) {
            echo "<p>" . $e->getMessage() . "</p>";
        }

        return $this;
    }

    public function alquilarClienteVehiculos(int $numSocio, array $numerosVehiculos): self {
        try {
            $clienteEncontrado = null;
            foreach ($this->clientes as $cliente) {
                if ($cliente->getNumero() === $numSocio) {
                    $clienteEncontrado = $cliente;
                    break;
                }
            }

            if (!$clienteEncontrado) {
                throw new ClienteNoEncontradoException("Error: Socio con número " . $numSocio . " no encontrado.");
            }

            $vehiculosAAlquilar = [];
            foreach ($numerosVehiculos as $numVehiculo) {
                $vehiculoEncontrado = null;
                foreach ($this->vehiculos as $vehiculo) {
                    if ($vehiculo->getNumero() === $numVehiculo) {
                        $vehiculoEncontrado = $vehiculo;
                        break;
                    }
                }

                if (!$vehiculoEncontrado) {
                    throw new VehiculoNoEncontradoException("Error: Vehículo con número " . $numVehiculo . " no encontrado.");
                }

                if ($vehiculoEncontrado->alquilado) {
                    throw new VehiculoYaAlquiladoException("El vehículo número " . $numVehiculo . " ya está alquilado.");
                }

                if ($clienteEncontrado->tieneAlquilado($vehiculoEncontrado)) {
                    throw new VehiculoYaAlquiladoException("El cliente " . $clienteEncontrado->nombre . " ya tiene alquilado el vehículo número " . $numVehiculo . ".");
                }

                $vehiculosAAlquilar[] = $vehiculoEncontrado;
            }

            if ($clienteEncontrado->getNumVehiculosAlquilados() + count($vehiculosAAlquilar) > $clienteEncontrado->maxAlquilerConcurrente) {
                throw new CupoSuperadoException("El cliente " . $clienteEncontrado->nombre . " superaría el cupo máximo de alquileres concurrentes (" . $clienteEncontrado->maxAlquilerConcurrente . ").");
            }

            foreach ($vehiculosAAlquilar as $vehiculo) {
                $clienteEncontrado->alquilar($vehiculo);
                $this->numVehiculosAlquilados++;
                $this->numTotalAlquileres++;
            }

        } catch (AlquilerMovilidadException $e) {
            echo "<p>" . $e->getMessage() . "</p>";
        }

        return $this;
    }

    public function devolverClienteVehiculo(int $numSocio, int $numVehiculo): self {
        try {
            $clienteEncontrado = null;
            foreach ($this->clientes as $cliente) {
                if ($cliente->getNumero() === $numSocio) {
                    $clienteEncontrado = $cliente;
                    break;
                }
            }

            if (!$clienteEncontrado) {
                throw new ClienteNoEncontradoException("Error: Socio con número " . $numSocio . " no encontrado.");
            }

            $clienteEncontrado->devolver($numVehiculo);

            $this->numVehiculosAlquilados--;

        } catch (AlquilerMovilidadException $e) {
            echo "<p>" . $e->getMessage() . "</p>";
        }

        return $this;
    }

    public function devolverClienteVehiculos(int $numSocio, array $numerosVehiculos): self {
        foreach ($numerosVehiculos as $numVehiculo) {
            $this->devolverClienteVehiculo($numSocio, $numVehiculo);
        }

        return $this;
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

    public function getNumVehiculosAlquilados(): int {
        return $this->numVehiculosAlquilados;
    }

    public function getNumTotalAlquileres(): int {
        return $this->numTotalAlquileres;
    }
}