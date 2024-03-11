<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

//Guardo las variables de la conexión en un archivo aparte.
require_once("./config.php");

// Verificar si el usuario ya está autenticado, si es así, redirigir a la página correspondiente
if (isset($_SESSION['usuario']) && isset($_SESSION['perfil'])) {
    if ($_SESSION['perfil'] == 'normal') {
        header("Location: pagina_de_compras.php");
    } elseif ($_SESSION['perfil'] == 'admin') {
        header("Location: pagina_de_administracion.php");
    }
    exit();
}

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Utilizo las variables incluidas en config.php para la conexión.
    $conexion = new mysqli($db_host, $db_usuario, $db_contrasena, $db_nombre);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Preparar consulta SQL
    $sql = "SELECT * FROM usuarios WHERE usuario=?";
    $login = $conexion->prepare($sql);

    // Vincular parámetros
    $login->bind_param("s", $usuario);

    // Ejecutar consulta
    $login->execute();

    // Obtener resultados
    $resultado = $login->get_result();

    if ($resultado->num_rows > 0) {
        // Usuario encontrado, verificar contraseña
        $fila = $resultado->fetch_assoc();
        if (password_verify($contrasena, $fila['contrasena'])) {
            // Contraseña correcta, iniciar sesión
            $_SESSION['usuario'] = $usuario;
            $_SESSION['perfil'] = $fila['perfil'];

            if ($_SESSION['perfil'] == 'normal') {
                header("Location: pagina_de_compras.php");
            } elseif ($_SESSION['perfil'] == 'admin') {
                header("Location: pagina_de_administracion.php");
            }
            exit();
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Usuario no encontrado";
    }

    // Cerrar la conexión
    $login->close();
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h2>Iniciar sesión</h2>
    <?php if (isset($error)) { ?>
        <p>
            <?php echo $error; ?>
        </p>
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
