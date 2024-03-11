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
    // Conexión a la base de datos
    $db_host = "localhost";
    $db_usuario = "usuario_db";
    $db_contrasena = "contrasena_db";
    $db_nombre = "nombre_db";

    $conn = new mysqli($db_host, $db_usuario, $db_contrasena, $db_nombre);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Preparar consulta SQL
    $sql = "SELECT * FROM usuarios WHERE usuario=? AND contrasena=?";
    $stmt = $conn->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param("ss", $usuario, $contrasena);

    // Ejecutar consulta
    $stmt->execute();

    // Obtener resultados
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        // Usuario autenticado, obtener perfil
        $fila = $resultado->fetch_assoc();
        $perfil = $fila['perfil'];

        // Iniciar sesión y redirigir al usuario a la página correspondiente
        $_SESSION['usuario'] = $usuario;
        $_SESSION['perfil'] = $perfil;

        if($perfil == 'normal') {
            header("Location: pagina_de_compras.php");
        } elseif($perfil == 'admin') {
            header("Location: pagina_de_administracion.php");
        }
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
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
