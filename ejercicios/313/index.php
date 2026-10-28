<?php
include_once "Empresa.php";
include_once "Empleado.php";
include_once "Gerente.php";

$miEmpresa = new Empresa("MinerosSl", "Calle de las Minas 123, León");

$empleado1 = new Empleado("Carlos", "García", 28, 160, 20);
$empleado1->anyadirTelefono(611111111);
$empleado1->anyadirTelefono(911111111);

$empleado2 = new Empleado("Lucía", "Martínez", 22, 140, 22);
$empleado2->anyadirTelefono(622222222);

$gerente1 = new Gerente("Roberto", "Sánchez", 45, 3000);
$gerente1->anyadirTelefono(633333333);

$gerente2 = new Gerente("Ana", "Gómez", 38, 2800);
$gerente2->anyadirTelefono(644444444);
$gerente2->anyadirTelefono(944444444);

$miEmpresa->anyadirTrabajador($empleado1);
$miEmpresa->anyadirTrabajador($empleado2);
$miEmpresa->anyadirTrabajador($gerente1);
$miEmpresa->anyadirTrabajador($gerente2);
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<p>Nombre: <?php echo $miEmpresa->getNombre(); ?></p>
<p>Dirección: <?php echo $miEmpresa->getDireccion(); ?></p>
<p>Coste Total de Nóminas:<?php echo $miEmpresa->getCosteNominas(); ?>€</p>

<hr>

<?php
echo $miEmpresa->listarTrabajadores();
?>
</body>
</html>