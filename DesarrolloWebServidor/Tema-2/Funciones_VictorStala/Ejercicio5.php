<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>

<body>
    <?php
    function calcularSemisuma($num1, $num2)
    {
        $semisuma = ($num1 + $num2) / 2;
        return $semisuma;
    }

    $numero1 = 10;
    $numero2 = 20;
    echo "La semisuma de $numero1 y $numero2 es: " . calcularSemisuma($numero1, $numero2);
    ?>

</body>

</html>