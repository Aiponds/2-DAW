<?php
// Incluyo externamente la conexión a la base de datos.
include_once('config/config.php');
session_start();

// Si la sesión no ha sido iniciada, envía el usuario al inicio de sesión.
// Si la sesión NO coincide con el perfil de administrador, lo reenvía a la página de usuarios comunes.
// Si no cumple ninguna, la sesión es del perfil administrador, por lo que le carga la página del administrador en este archivo.
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
} else {
    if ($_SESSION['perfil'] != 'administrador') {
        header('Location: index.php');
        exit;
    }

    // Eliminar tipo de leña
    if (isset($_GET['delete_wood'])) {
        $wood_id = $_GET['delete_wood'];
        $sql = "DELETE FROM productos WHERE id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id', $wood_id);
        $stmt->execute();
        // Redireccionar a la página actual para evitar reenvío de formularios
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    }

    // Insertar tipo de leña
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_wood'])) {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];

        // Verificar si el archivo es una imagen PNG o JPG
        $permitidos = array('image/jpeg', 'image/png');
        $imagen_tipo = $_FILES['imagen']['type'];
        if (!in_array($imagen_tipo, $permitidos)) {
            echo "Solo se permiten imágenes de tipo PNG y JPG.";
            exit;
        }

        // Procesar la imagen cargada
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_temp = $_FILES['imagen']['tmp_name'];
        $imagen_destino = 'img/' . $imagen_nombre;

        // Mover la imagen al directorio de img
        if (move_uploaded_file($imagen_temp, $imagen_destino)) {
            echo "Imagen subida correctamente.";
        } else {
            echo "Hubo un error al subir la imagen.";
            exit;
        }

        // Guardar solo el nombre de la imagen en la base de datos
        $imagen_guardar = pathinfo($imagen_nombre, PATHINFO_FILENAME) . '.jpg';

        $sql = "INSERT INTO productos (nombre, imagen, descripcion, precio) VALUES (:nombre, :imagen, :descripcion, :precio)";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':imagen', $imagen_guardar); // Guardar solo el nombre de la imagen
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->execute();

        // Redireccionar a la página actual para evitar reenvío de formularios
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    }

    // Dar de alta un usuario
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_register'])) {
        $nombre_usuario = $_POST['nombre_usuario'];
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        $perfil = $_POST['perfil'];

        // Hashear la contraseña antes de almacenarla
        $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nombre, usuario, contrasena, perfil) VALUES (:nombre, :usuario, :contrasena, :perfil)";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':nombre', $nombre_usuario);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':contrasena', $contrasena_hash);
        $stmt->bindParam(':perfil', $perfil);
        $stmt->execute();

        // Redireccionar a la página actual para evitar reenvío de formularios
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    }

    // Dar de baja un usuario
    if (isset($_GET['delete_user'])) {
        $user_id = $_GET['delete_user'];
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
        // Redireccionar a la página actual para evitar reenvío de formularios
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    }

    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administración de la web</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <div class="container">
            <h1>Administración de la web</h1>
            <!-- Formulario para insertar tipo de leña -->
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                <h2>Insertar tipo de leña</h2>
                <input type="text" name="nombre" placeholder="Nombre" required><br>
                <input type="file" name="imagen" accept="image/png, image/jpeg" required><br>
                <textarea name="descripcion" placeholder="Descripción" required></textarea><br>
                <input type="number" name="precio" placeholder="Precio" required><br>
                <input type="submit" name="submit_wood" value="Insertar tipo de leña">
            </form>

            <!-- Listado de tipos de leña con opción de eliminar -->
            <h2>Tipos de leña</h2>
            <ul>
                <?php
                $sql = "SELECT * FROM productos";
                $stmt = $connection->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // Corregir la ruta de la imagen
                    $imagen = './img/' . $row['imagen'];
                    echo "<li>{$row['nombre']} - {$row['precio']} € <img src=\"{$imagen}\" alt=\"{$row['nombre']}\" style=\"max-width: 100px;\"> <a href=\"{$_SERVER['PHP_SELF']}?delete_wood={$row['id']}\">Eliminar</a></li>";
                }
                ?>
            </ul>

            <!-- Formulario para registrar usuario -->
            <h2>Dar de alta un usuario</h2>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" name="nombre_usuario" placeholder="Nombre completo" required><br>
                <input type="text" name="usuario" placeholder="Nombre de usuario" required><br>
                <input type="password" name="contrasena" placeholder="Contraseña" required><br>
                <select name="perfil" required>
                    <option value="">Seleccionar perfil</option>
                    <option value="administrador">Administrador</option>
                    <option value="usuario">Usuario</option>
                </select><br>
                <input type="submit" name="submit_register" value="Registrar usuario">
            </form>

            <!-- Listado de usuarios con opción de eliminar -->
            <h2>Usuarios</h2>
            <ul>
                <?php
                $sql = "SELECT * FROM usuarios";
                $stmt = $connection->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // Si el usuario actual es administrador y no es el mismo que el usuario en la fila actual, muestra el botón de eliminar
                    if ($_SESSION['perfil'] == 'administrador' && $row['id'] != $_SESSION['id']) {
                        echo "<li>{$row['nombre']} - {$row['email']} <a href=\"{$_SERVER['PHP_SELF']}?delete_user={$row['id']}\">Eliminar</a></li>";
                    } else {
                        // Si no, solo muestra los datos del usuario
                        echo "<li>{$row['nombre']} - {$row['email']}</li>";
                    }
                }
                ?>
            </ul>

        </div>

        <footer>
            <div>
                <button type="button" onclick="location.href='logout.php'">Cerrar sesión</button>
            </div>
        </footer>
    </body>

    </html>
    <?php
}
?>