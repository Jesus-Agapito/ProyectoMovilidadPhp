<?php
// v0.331 - Archivo de prueba en la raíz
include_once "AlquilerMovilidad.php";

// Importación mediante use para acceso sin cualificar
use Dwes\AlquilerMovilidad\AlquilerMovilidad;

$am = new AlquilerMovilidad("Severo 8A");

// Incluir vehículos de prueba
$am->incluirCocheElectrico("Tesla Model 3", 19.99, "Tesla Model 3", 5, 5);
$am->incluirCocheElectrico("Nissan Leaf", 49.99, "Nissan Leaf", 5, 5);
$am->incluirBicicletaElectrica("Orbea Vibe", 4.5, 3, "Urbana");
$am->incluirBicicletaElectrica("Specialized Turbo", 4.5, 7, "Mixta");
$am->incluirPatinete("Ninebot Max", 3, 65);
$am->incluirPatinete("Xiaomi Pro 2", 3.5, 45);

// Listar vehículos
$am->listarVehiculos();

// Crear socios
$am->incluirSocio("Amancio Ortega");
$am->incluirSocio("Pablo Picasso", 2);

// Utilizando encadenamiento de métodos tal como se solicita (v0.331)
$am->alquilarClienteVehiculo(1,2)->alquilarClienteVehiculo(1,3)->alquilarClienteVehiculo(1,2)->alquilarClienteVehiculo(1,6);

// Listar socios
$am->listarSocios();