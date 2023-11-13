<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>

<body>
    <?php
    function textoEnNegrita($texto)
    {
        return "<b>$texto</b>";
    }

    $textoOriginal = "Este es un texto";
    echo "Texto original: $textoOriginal<br>";
    echo "Texto en negrita: " . textoEnNegrita($textoOriginal);
    ?>

</body>

</html>