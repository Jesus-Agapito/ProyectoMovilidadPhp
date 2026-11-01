<?php
// v0.332 - Archivo de prueba en la raíz con pruebas de devolución
include_once "modelo/AlquilerMovilidad.php";

// Importación mediante use para realizar accesos sin cualificar
use Dwes\AlquilerMovilidad\AlquilerMovilidad;

$am = new AlquilerMovilidad("Severo 8A");

// 1. Incluir vehículos de prueba
$am->incluirCocheElectrico("Tesla Model 3", 19.99, "Tesla Model 3", 5, 5);
$am->incluirCocheElectrico("Nissan Leaf", 49.99, "Nissan Leaf", 5, 5);
$am->incluirBicicletaElectrica("Orbea Vibe", 4.5, 3, "Urbana");
$am->incluirBicicletaElectrica("Specialized Turbo", 4.5, 7, "Mixta");
$am->incluirPatinete("Ninebot Max", 3, 65);
$am->incluirPatinete("Xiaomi Pro 2", 3.5, 45);

// Listar los vehículos agregados
$am->listarVehiculos();

// 2. Crear socios
$am->incluirSocio("Amancio Ortega");     // Socio 1 (cupo por defecto: 3)
$am->incluirSocio("Pablo Picasso", 2);   // Socio 2 (cupo máximo: 2)

// 3. Probar alquiler individual encadenado
echo "<h3>Prueba de alquileres individuales encadenados:</h3>";
$am->alquilarClienteVehiculo(1, 2)
    ->alquilarClienteVehiculo(1, 3)
    ->alquilarClienteVehiculo(1, 6);

// 4. Probar alquiler múltiple mediante array
echo "<h3>Prueba de alquiler por array (alquilarClienteVehiculos):</h3>";
$am->alquilarClienteVehiculos(2, [4, 5]);

// 5. Probar las nuevas devoluciones (individual y por array encadenadas)
echo "<h3>Prueba de devoluciones con encadenamiento:</h3>";
$am->devolverClienteVehiculo(1, 3)          // Devuelve el vehículo 3 del socio 1
->devolverClienteVehiculos(2, [4, 5]);    // Devuelve los vehículos 4 y 5 del socio 2 en lote

// 6. Mostrar resumen de socios y estadísticas finales
$am->listarSocios();

echo "<h3>Estadísticas globales:</h3>";
echo "<p>Vehículos actualmente alquilados: " . $am->getNumVehiculosAlquilados() . "</p>";
echo "<p>Total histórico de alquileres realizados: " . $am->getNumTotalAlquileres() . "</p>";