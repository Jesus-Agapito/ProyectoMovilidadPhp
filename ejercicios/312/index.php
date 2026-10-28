<?php
include_once "Empleado.php";
include_once "Gerente.php";

$empleado1 = new Empleado("Aga", "Laza", 25, 160, 25);
$empleado1->anyadirTelefono(611223344);
$empleado1->anyadirTelefono(915554433);

$gerente1 = new Gerente("María", "Pérez", 40, 3000);
$gerente1->anyadirTelefono(699887766);
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php
echo "<p>" . $empleado1 . "</p>";
echo "<p>Impuestos: " . ($empleado1->debePagarImpuestos() ? "Tiene que pagar impuestos" : "No tiene que pagar impuestos") . "</p>";
echo Empleado::toHtml($empleado1);
?>

<hr>

<?php
echo "<p>" . $gerente1 . "</p>";
echo "<p>Impuestos:" . ($gerente1->debePagarImpuestos() ? "Tiene que pagar impuestos" : "No tiene que pagar impuestos") . "</p>";
echo Gerente::toHtml($gerente1);
?>
</body>
</html>