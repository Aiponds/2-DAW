<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>
    <?php
    function calcularMediaAritmeticaV2(...$numeros)
    {
        $cantidadNumeros = count($numeros);

        if ($cantidadNumeros == 0) {
            return "No se proporcionaron números.";
        }

        $suma = array_sum($numeros);
        $media = $suma / $cantidadNumeros;

        return $media;
    }

    echo "La media aritmética es: " . calcularMediaAritmeticaV2(5, 10, 15, 20);
    ?>

</body>

</html>