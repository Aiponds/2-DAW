<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>

<body>
    <?php
    function mostrarInformacionPais($pais, $capital = "Madrid", $habitantes = "muchos")
    {
        echo "La capital de $pais es $capital y tiene $habitantes habitantes.";
    }

    mostrarInformacionPais("España");
    mostrarInformacionPais("Portugal", "Lisboa");
    mostrarInformacionPais("Francia", "París", "6.000.000");
    ?>

</body>

</html>