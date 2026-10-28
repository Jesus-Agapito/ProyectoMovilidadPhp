<?php
include "Persona.php"; //Aqui está definida la clase persona

$persona1 = new Persona("Jose", "López", 34);
//$persona1->setNombre("Jose");
//$persona1->setApellidos("López");
//$persona1->setEdad(34);
$persona2 = new Persona("María", "De la o");
$persona3 = new Persona("Manolo", "De la u", 23);


$persona1 = $persona2;
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
    <h1>Prueba de clase Persona</h1>
    <?php
    echo Persona::TRATAMIENTO. " " .$persona1->mostrar();
    ?>
<p>Total de personas: <?= Persona::getContadorPersonas();?></p>

    <?php
    //Pruebas de Introspección
    if ($persona1 instanceof Persona){
        echo "<p>Es una persona</p>";
        echo "<p>La clasde de \$persona1 es:". get_class($persona1). "</p>";
                class_alias("Persona", "Humano");
                $persona4 = new Humano("Juan", "Tebas");
                print_r(get_class_methods($persona1));
                print_r(get_class_vars("Persona"));
        print_r(get_object_vars($persona1));

    }
    ?>
</body>
</html>
