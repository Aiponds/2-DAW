<?php
//Incluyo externamente la conexion a la base de datos.
include_once('config/config.php');
session_start();

//Si la sesión no ha sido iniciada, envia el usuario a el inicio de sesión.
//Si la sesión NO coincide con el perfil de administrador, lo reenvía a la página de usuarios comunes.
//Si no cumple ninguna, la sesión es del perfil administrador, por lo que le carga la página del administrador en este archivo.
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
        $imagen = $_POST['imagen'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $sql = "INSERT INTO productos (nombre, imagen, descripcion, precio) VALUES (:nombre, :imagen, :descripcion, :precio)";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->execute();
        // Redireccionar a la página actual para evitar reenvío de formularios
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    }

    // Registrar usuario
    // Aquí puedes implementar la lógica para registrar un nuevo usuario

    // Eliminar usuarios
    // Aquí puedes implementar la lógica para eliminar usuarios
    
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
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <h2>Insertar tipo de leña</h2>
                <input type="text" name="nombre" placeholder="Nombre" required><br>
                <input type="text" name="imagen" placeholder="URL de imagen" required><br>
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
                    echo "<li>{$row['nombre']} - {$row['precio']} € <a href=\"{$_SERVER['PHP_SELF']}?delete_wood={$row['id']}\">Eliminar</a></li>";
                }
                ?>
            </ul>

            <!-- Formulario para registrar usuario -->
            <!-- Aquí puedes agregar el formulario para registrar usuario -->

            <!-- Listado de usuarios con opción de eliminar -->
            <!-- Aquí puedes agregar el listado de usuarios con opción de eliminar -->
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
