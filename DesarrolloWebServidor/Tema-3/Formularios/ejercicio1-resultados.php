<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
</head>

<body>
    <h2 style="color: blue;">Formulario Simple. Resultado del formulario</h2>
    <p>Estos son los datos introducidos:</p>
    <?php
        if (isset($_POST['busqueda']) && isset($_POST['buscar']) && isset($_POST['genero'])) {
            echo "Texto de busqueda: " . $_POST['busqueda'] . "<br>";
            echo "Buscar en: " . $_POST['buscar'] . "<br>";
            echo "Género: " . $_POST['genero'] . "<br>";
        } else {
            echo "Por favor, completa los campos del formulario.";
        }
    ?>
    <p>[ <a href="./ejercicio1.php">Nueva búsqueda</a> ]</p>
</body>

</html>