<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>

<body>
    <?php
    function crearPagina($titulo)
    {
        echo "<!DOCTYPE html>
            <html>
            <head>
                <title>$titulo</title>
            </head>
            <body>";
    }

    $tituloPagina = "Título de la Página";
    crearPagina($tituloPagina);
    ?>

</body>

</html>