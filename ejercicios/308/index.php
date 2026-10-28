<?php
include "Empleado.php";

$empleado1 = new Empleado("Aga", "Laza", 3500);
$empleado1->anyadirTelefono(611223344);
$empleado1->anyadirTelefono(915554433);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php
echo Empleado::toHtml($empleado1);
?>
</body>
</html>