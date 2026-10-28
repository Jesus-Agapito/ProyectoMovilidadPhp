<?php

//1º Incluir el código donde está
require_once "model/eso/Alumno.php";
require_once "model/fp/Alumno.php";


//2º Simplificar la llamada a las clases medinte use
use App\Model\Eso\Alumno as AlumnoESO;
use App\Model\Fp\Alumno as AlumnoFP;

$alumnoESO = new AlumnoESO("53819287H", "Manolo");
$alumnoFP = new AlumnoFP("77894371W", "Paquito");

//Sin el use
//$alumnoESO = new \App\Model\Eso\Alumno("53819287H", "Manolo");
//$alumnoFP = new App\Model\Fp\Alumno("77894371W", "Paquito");

echo $alumnoESO->muestra();
echo "<br>";
echo $alumnoFP->muestra();