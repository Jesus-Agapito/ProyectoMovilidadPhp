<?php
include "Empleado.php";

$empleado1 = new Empleado("Aga", "Laza", 22, 3500);
$empleado1->anyadirTelefono(611223344);
$empleado1->anyadirTelefono(915554433);

$mensajeImpuestos = $empleado1->debePagarImpuestos() ? "Tiene que pagar impuestos" : "No tiene que pagar impuestos";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 310 - __toString</title>
</head>
<body>
<?php
echo "<p>" . $empleado1 . "</p>";

echo "<p>" . $mensajeImpuestos . "</p>";
?>
</body>
</html>