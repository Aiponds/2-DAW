<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
</head>

<body>
    <?php
    if (isset($_POST['cadena'])) {
        echo "Text: " . $_POST['cadena'] . "<br>";
    }
    if (isset($_POST['sexo'])) {
        echo "Sexo: " . $_POST['sexo'] . "<br>";
    }
    if (isset($_POST['extras[]'])) {
        echo "Extras: " . implode(",", $_POST['extras']) . "<br>";
    }
    if (isset($_POST['clave'])) {
        echo "Contraseña: " . $_POST['clave'] . "<br>";
    }
    if (isset($_POST['color'])) {
        echo "Color: " . $_POST['color'] . "<br>";
    }
    if (isset($_POST['idiomas'])) {
        echo "Idiomas: " . implode(", ", $_POST['idiomas']) . "<br>";
    }
    if (isset($_POST['comentario'])) {
        echo "Comentario: " . $_POST['comentario'] . "<br>";
    }

    ?>
    <form action="ejercicio2.php" method="post">
        <input type="submit" value="Volver al formulario">
    </form>
</body>

</html>