<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>

<body>
    <?php
    $alumnos = array("Juan", "María", "Pedro", "Laura", "Carlos");

    echo "Primeros 3 alumnos:<br>";
    print_r(array_slice($alumnos, 0, 3));

    echo "<br><br>Últimos 2 alumnos:<br>";
    print_r(array_slice($alumnos, -2));
    ?>
</body>

</html>
