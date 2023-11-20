<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>

<body>
    <?php
    $colores = array(
        "fuerte" => array("FF0000", "00FF00", "0000FF"),
        "suave" => array("FF88CC", "AABBCC", "DDEEFF")
    );

    $color1 = "FF88CC";
    $color2 = "FF0000";

    if (in_array($color1, $colores["fuerte"]) || in_array($color1, $colores["suave"])) {
        echo "$color1 encontrado en el array.<br>";
    } else {
        echo "$color1 no encontrado en el array.<br>";
    }

    if (in_array($color2, $colores["fuerte"]) || in_array($color2, $colores["suave"])) {
        echo "$color2 encontrado en el array.<br>";
    } else {
        echo "$color2 no encontrado en el array.<br>";
    }
    ?>
</body>

</html>
