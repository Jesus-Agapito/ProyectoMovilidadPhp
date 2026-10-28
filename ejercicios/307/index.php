<?php
include "Empleado.php";

$empleado1 = new Empleado("Aga", "Laza", 3500);
$empleado1->anyadirTelefono(611223344);
$empleado1->anyadirTelefono(915554433);

$mensajeImpuestos = $empleado1->debePagarImpuestos() ? "Tiene que pagar impuestos" : "No tiene que pagar impuestos";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<?php
echo "<p><strong>Nombre Completo:</strong> " . $empleado1->getNombreCompleto() . "</p>";
echo "<p><strong>Estado de Impuestos:</strong> " . $mensajeImpuestos . "</p>";
echo "<hr>";
echo "<h3>Vista HTML del Empleado:</h3>";
echo Empleado::toHtml($empleado1);
?>
</body>
</html>