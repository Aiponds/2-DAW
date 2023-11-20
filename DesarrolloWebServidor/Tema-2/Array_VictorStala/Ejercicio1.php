<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <?php
    // dias.php
    $dias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");

    // Mostrar usando foreach
    echo "Mostrar usando foreach:<br>";
    foreach ($dias as $indice => $valor) {
        echo "Índice: $indice, Valor: $valor<br>";
    }

    // Mostrar usando for
    echo "<br>Mostrar usando for:<br>";
    $longitud = count($dias);
    for ($i = 0; $i < $longitud; $i++) {
        echo "Índice: $i, Valor: " . $dias[$i] . "<br>";
    }
    ?>

</body>

</html>