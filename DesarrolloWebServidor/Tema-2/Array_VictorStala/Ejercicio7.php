<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>

<body>
    <?php
    $random_array = array(2, 5, 2, 8, 2, 1, 6, 2, 9, 10);

    $numero_dos = array_count_values($random_array);

    if (isset($numero_dos[2])) {
        echo "El número de valores iguales a 2 es: " . $numero_dos[2];
    } else {
        echo "El número 2 no se encontró en el array.";
    }
    ?>
</body>

</html>
