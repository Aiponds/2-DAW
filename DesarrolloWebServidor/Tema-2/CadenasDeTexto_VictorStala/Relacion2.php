<!DOCTYPE html>
<html>
<head>
    <title>Verificar dirección de correo electrónico</title>
</head>
<body>
    <h1>Verificar dirección de correo electrónico</h1>
    <form method="post" action="">
        <label for="correo">Dirección de correo electrónico:</label>
        <input type="text" name="correo" id="correo" required><br><br>
        <input type="submit" name="verificar" value="Verificar">
    </form>

    <?php
    if (isset($_POST['verificar'])) {
        $correo = $_POST['correo'];

        // Verificar si la dirección de correo contiene '@' y '.'
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            // Separar el nombre de usuario y el dominio
            list($nombre_usuario, $dominio) = explode('@', $correo);

            echo "<p>Nombre de usuario: $nombre_usuario</p>";
            echo "<p>Dominio: $dominio</p>";
        } else {
            echo "<p>La dirección de correo electrónico no es válida.</p>";
        }
    }
    ?>
</body>
</html>
