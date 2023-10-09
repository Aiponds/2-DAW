<!DOCTYPE html>
<html>
<head>
    <title>Validar Nombre de Usuario</title>
</head>
<body>
    <h1>Validar Nombre de Usuario</h1>
    <form method="post" action="">
        <label for="username">Nombre de usuario:</label>
        <input type="text" name="username" id="username" required><br><br>
        <input type="submit" name="validar" value="Validar">
    </form>

    <?php
    if (isset($_POST['validar'])) {
        $username = $_POST['username'];

        // Comprobar la longitud del nombre de usuario
        $longitud_minima = 3;
        $longitud_maxima = 20;
        $longitud_nombre = strlen($username);

        // Comprobar si la longitud está dentro de los límites permitidos
        if ($longitud_nombre >= $longitud_minima && $longitud_nombre <= $longitud_maxima) {
            // Comprobar si el nombre de usuario contiene solo caracteres permitidos (letras, números, guión alto, guión bajo)
            if (preg_match('/^[a-zA-Z0-9-_]+$/', $username)) {
                echo "<p>Nombre de usuario válido: $username</p>";
            } else {
                echo "<p>El nombre de usuario contiene caracteres no permitidos.</p>";
            }
        } else {
            echo "<p>La longitud del nombre de usuario no está dentro de los límites permitidos (entre $longitud_minima y $longitud_maxima caracteres).</p>";
        }
    }
    ?>
</body>
</html>
