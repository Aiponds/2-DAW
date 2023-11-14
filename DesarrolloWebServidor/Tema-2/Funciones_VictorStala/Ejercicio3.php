<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>
    <?php
    function calcularSegundos($dias)
    {
        $segundosPorDia = 24 * 60 * 60;
        return $dias * $segundosPorDia;
    }

    $dias = 5;
    echo "El número de segundos en $dias días es: " . calcularSegundos($dias);
    ?>

</body>

</html>