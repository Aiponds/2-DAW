<?php
session_start();
require_once("./config.php"); // Incluye el archivo de configuración con las credenciales de la base de datos

// Función para obtener la lista de usuarios desde la base de datos
function obtenerListaUsuarios($conn) {
    $sql = "SELECT id, nombre, usuario FROM usuarios";
    $resultado = $conn->query($sql);

    $lista_usuarios = array();
    if ($resultado->num_rows > 0) {
        while($fila = $resultado->fetch_assoc()) {
            $lista_usuarios[] = $fila;
        }
    }
    return $lista_usuarios;
}

// Verificar si el usuario tiene el perfil de administrador
if(!isset($_SESSION['usuario']) || !isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: index.php");
    exit();
}

// Crear conexión a la base de datos
$conn = new mysqli($db_host, $db_usuario, $db_contrasena, $db_nombre);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario de alta de usuario
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['alta_usuario'])) {
    // Obtener datos del formulario
    $nuevo_nombre = $_POST['nuevo_nombre'];
    $nuevo_usuario = $_POST['nuevo_usuario'];
    $nueva_contrasena = $_POST['nueva_contrasena'];

    // Verificar si el nuevo usuario ya existe
    $sql_verificar_usuario = "SELECT usuario FROM usuarios WHERE usuario = '$nuevo_usuario'";
    $resultado_verificacion = $conn->query($sql_verificar_usuario);
    if ($resultado_verificacion->num_rows > 0) {
        $error_alta = "El usuario ya existe.";
    } else {
        // Insertar nuevo usuario en la base de datos
        $sql_insertar_usuario = "INSERT INTO usuarios (nombre, usuario, contrasena, perfil) VALUES ('$nuevo_nombre', '$nuevo_usuario', '$nueva_contrasena', 'usuario')";
        if ($conn->query($sql_insertar_usuario) === TRUE) {
            header("Location: pagina_de_administracion.php");
            exit();
        } else {
            $error_alta = "Error al dar de alta al usuario.";
        }
    }
}

// Verificar si se ha enviado el formulario de baja de usuario
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['baja_usuario'])) {
    // Obtener ID de usuario a dar de baja
    $id_usuario_baja = $_POST['id_usuario_baja'];

    // Verificar que el usuario no se esté intentando dar de baja a sí mismo
    if($id_usuario_baja != $_SESSION['id_usuario']) {
        // Eliminar usuario de la base de datos
        $sql_eliminar_usuario = "DELETE FROM usuarios WHERE id = $id_usuario_baja";
        if ($conn->query($sql_eliminar_usuario) === TRUE) {
            header("Location: pagina_de_administracion.php");
            exit();
        } else {
            $error_baja = "Error al dar de baja al usuario.";
        }
    } else {
        $error_baja = "No puedes darte de baja a ti mismo.";
    }
}

// Obtener la lista de usuarios desde la base de datos
$lista_usuarios = obtenerListaUsuarios($conn);

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Administración</title>
    <link rel="stylesheet" href="styles.css"> <!-- Cambia esto por tu archivo CSS con estilos personalizados -->
</head>
<body>
    <h2>Página de Administración</h2>

    <!-- Formulario para dar de alta a nuevos usuarios -->
    <h3>Dar de alta a nuevo usuario</h3>
    <?php if(isset($error_alta)) { ?>
        <p><?php echo $error_alta; ?></p>
    <?php } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nuevo_nombre">Nombre:</label><br>
        <input type="text" id="nuevo_nombre" name="nuevo_nombre" required><br>
        <label for="nuevo_usuario">Usuario:</label><br>
        <input type="text" id="nuevo_usuario" name="nuevo_usuario" required><br>
        <label for="nueva_contrasena">Contraseña:</label><br>
        <input type="password" id="nueva_contrasena" name="nueva_contrasena" required><br><br>
        <input type="submit" name="alta_usuario" value="Dar de alta">
    </form>

    <!-- Formulario para dar de baja a usuarios existentes -->
    <h3>Usuarios existentes</h3>
    <ul>
        <?php foreach($lista_usuarios as $usuario) { ?>
            <li>
                <?php echo $usuario['nombre']; ?> (<?php echo $usuario['usuario']; ?>)
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="id_usuario_baja" value="<?php echo $usuario['id']; ?>">
                    <input type="submit" name="baja_usuario" value="Dar de baja">
                </form>
            </li>
        <?php } ?>
    </ul>

    <?php if(isset($error_baja)) { ?>
        <p><?php echo $error_baja; ?></p>
    <?php } ?>
</body>
</html>
