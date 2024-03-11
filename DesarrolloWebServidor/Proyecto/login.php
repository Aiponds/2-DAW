<?php
session_start();

// Verificar si el usuario ya está autenticado, si es así, redirigir a la página correspondiente
if(isset($_SESSION['usuario']) && isset($_SESSION['perfil'])) {
    if($_SESSION['perfil'] == 'normal') {
        header("Location: pagina_de_compras.php");
    } elseif($_SESSION['perfil'] == 'admin') {
        header("Location: pagina_de_administracion.php");
    }
    exit();
}

// Verificar si se ha enviado el formulario de inicio de sesión
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar los datos del formulario (podrías hacer más validaciones aquí, como verificar la contraseña con la base de datos)
    $usuario_valido = "usuario"; // Cambiar por el usuario válido
    $contrasena_valida = "contrasena"; // Cambiar por la contraseña válida

    if($_POST['usuario'] == $usuario_valido && $_POST['contrasena'] == $contrasena_valida) {
        // Iniciar sesión y redirigir al usuario a la página correspondiente
        $_SESSION['usuario'] = $usuario_valido;
        $_SESSION['perfil'] = 'normal'; // Cambiar a 'admin' si es un usuario administrador
        header("Location: pagina_de_compras.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="styles.css"> <!-- Cambia esto por tu archivo CSS con estilos personalizados -->
</head>
<body>
    <h2>Iniciar sesión</h2>
    <?php if(isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br>
        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
