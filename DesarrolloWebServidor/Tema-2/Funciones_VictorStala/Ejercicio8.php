<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>

<body>
    <?php
    function calcularSumatorio($numero)
    {
        $sumatorio = 0;
        for ($i = 1; $i <= $numero; $i++) {
            $sumatorio += $i;
        }
        return $sumatorio;
    }

    $numeroEjemplo = 5;
    echo "El sumatorio de los números hasta $numeroEjemplo es: " . calcularSumatorio($numeroEjemplo);
    ?>

</body>

</html>