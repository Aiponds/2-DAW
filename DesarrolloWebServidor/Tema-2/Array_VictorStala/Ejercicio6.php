<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>

<body>
    <?php
    $paises_capitales = array(
        "Francia" => "París",
        "España" => "Madrid",
        "Alemania" => "Berlín",
        "Italia" => "Roma",
        "Portugal" => "Lisboa"
    );

    foreach ($paises_capitales as $pais => $capital) {
        echo "La capital de $pais es $capital.<br>";
    }

    ksort($paises_capitales);
    echo "<br>Ordenado por nombre del país:<br>";
    foreach ($paises_capitales as $pais => $capital) {
        echo "La capital de $pais es $capital.<br>";
    }

    asort($paises_capitales);
    echo "<br>Ordenado por nombre de la capital:<br>";
    foreach ($paises_capitales as $pais => $capital) {
        echo "La capital de $pais es $capital.<br>";
    }
    ?>
</body>

</html>
