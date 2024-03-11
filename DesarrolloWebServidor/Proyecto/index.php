<?php
session_start();

// Incluye las variables de la conexión desde config.php
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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $password = $_POST['contrasena'];

    try {
        // Preparar la consulta para seleccionar el usuario por su nombre de usuario
        $query = $conexion->prepare("SELECT * FROM usuarios WHERE usuario=:usuario");
        $query->bindParam("usuario", $usuario, PDO::PARAM_STR);
        $query->execute();
        
        // Obtener el resultado de la consulta
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            $error = '<p class="error">¡Usuario o contraseña incorrectos!</p>';
        } else {
            // Verificar la contraseña
            if ($password == $result['contrasena']) {
                $_SESSION['usuario'] = $result['usuario'];
                $_SESSION['perfil'] = $result['perfil'];
                if ($_SESSION['perfil'] == 'administrador') {
                    header("Location: pagina_de_administracion.php");
                    exit;
                } else {
                    header("Location: index.php");
                    exit;
                }
            } else {
                $error = '<p class="error">¡Usuario o contraseña incorrectos!</p>';
            }
        }
    } catch (PDOException $e) {
        // Manejar errores de la consulta
        die("Error: " . $e->getMessage());
    }
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
        <?php echo $error; ?>
    <?php } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br>
        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        <input type="submit" name="login" value="Iniciar sesión">
    </form>
</body>

</html>
