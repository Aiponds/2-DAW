<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>
    <?php
    $colores = array(
        "fuerte" => array("FF0000", "00FF00", "0000FF"),
        "suave" => array("FF88CC", "AABBCC", "DDEEFF")
    );

    echo "<table border='1'>";
    foreach ($colores as $tipo => $coloresTipo) {
        echo "<tr><th>$tipo</th><th>Colores</th></tr>";
        foreach ($coloresTipo as $color) {
            echo "<tr><td>$tipo</td><td style='background-color: #$color;'>$color</td></tr>";
        }
    }
    echo "</table>";
    ?>
</body>

</html>
