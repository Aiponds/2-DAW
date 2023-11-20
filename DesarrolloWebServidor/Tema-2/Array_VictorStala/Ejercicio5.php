<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>

<body>
    <?php
    $pila = array("cinco" => 5, "uno" => 1, "cuatro" => 4, "dos" => 2, "tres" => 3);

    echo "Array original:<br>";
    print_r($pila);

    echo "<br><br>Ordenado por asort:<br>";
    asort($pila);
    print_r($pila);

    echo "<br><br>Ordenado por arsort:<br>";
    arsort($pila);
    print_r($pila);

    echo "<br><br>Ordenado por ksort:<br>";
    ksort($pila);
    print_r($pila);

    echo "<br><br>Ordenado por sort:<br>";
    sort($pila);
    print_r($pila);

    echo "<br><br>Ordenado por rsort:<br>";
    rsort($pila);
    print_r($pila);
    ?>
</body>

</html>
