<?php
include "Empleado2.php";

$empleado2 = new Empleado2();
$empleado2->setNombre("Jesús Agapito");
$empleado2->setApellidos("García Laza");
$empleado2->setSueldo(3334);

$empleado2->anyadirTelefono(668653514);
$empleado2->anyadirTelefono(722698467);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
echo $empleado2->getNombreCompleto();
echo ($empleado2->debePagarImpuestos()) ? "Tiene que pagar impuestos" : "No tiene que pagar impuestos";
echo "<p> Teléfonos: " . $empleado2->listarTelefonos() . "</p>";
echo "<hr>";
echo $empleado2->vaciarTelefonos() . "<p> Se ha vaciado el Array de teléfonos </p>";
echo "<hr>";
echo "<p> Teléfonos: " . $empleado2->listarTelefonos() . "</p>";
echo "<hr>";

?>
</body>
</html>