<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>

<body>
    <?php
    function calcularCuadrado($numero)
    {
        return $numero * $numero;
    }

    function calcularCubo($numero)
    {
        return $numero * $numero * $numero;
    }

    $numeroEjemplo = 4;
    echo "El cuadrado de $numeroEjemplo es: " . calcularCuadrado($numeroEjemplo) . "<br>";
    echo "El cubo de $numeroEjemplo es: " . calcularCubo($numeroEjemplo);
    ?>

</body>

</html>