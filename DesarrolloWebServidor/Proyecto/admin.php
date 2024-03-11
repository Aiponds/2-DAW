<?php
include_once('config/config.php');
include_once('includes/funciones.php');
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
} else {
    if ($_SESSION['perfil'] != 'administrador') {
        header('Location: index.php');
        exit;
    }
?>
    <!DOCTYPE html>
    <html lang="es" data-bs-theme="<?php echo $_COOKIE["tema"]; ?>">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tienda de Videojuegos - Panel de administrador</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <?php
        // Eliminar videojuegos
        if (isset($_POST["eliminar"])) {
            if (isset($_POST["ids"])) {
                $ids = $_POST["ids"];
                foreach ($ids as $id) {
                    $eliminar = $connection->prepare('DELETE FROM productos WHERE id=:id');
                    $eliminar->bindParam("id", $id);
                    $eliminar->execute();
                }
                echo "<script>alert('Se han eliminado los videojuegos con ID: ";
                foreach ($ids as $id) {
                    echo "$id ";
                }
                echo "correctamente.')</script>";
            }
        }
        // Insertar videojuego
        if (isset($_POST["insertar"])) {
            if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                $info = getimagesize($_FILES['imagen']['tmp_name']);
                if ($info !== false) {
                    $ruta = "img/";
                    $temporal = $_FILES['imagen']['tmp_name'];
                    $nombre = $_FILES['imagen']['name'];
                    $nombre = time() . substr($nombre, 0, strpos($nombre, ".")) . ".jpg";
                    $rutaCompleta = $ruta . $nombre;
                    //Gracias al módulo php-imagick podemos redimensionar la imagen y convertirla a jpg!
                    $imagen = new Imagick();
                    $imagen->setFormat('jpg');
                    $imagen->readImage($temporal);
                    $imagen->setImageCompressionQuality(80);
                    $imagen->scaleImage(512, 512);
                    $imagen->writeImage($rutaCompleta);
                    $imagen->destroy();

                    $sql = "INSERT INTO productos (nombre, imagen, descripcion, precio) VALUES (?, ?, ?, ?)";
                    $insertar = $connection->prepare($sql);
                    $insertar->execute([$_POST["nombre"], $rutaCompleta, $_POST["descripcion"], $_POST["precio"]]);

                    echo "<script>alert('El videojuego [" . $_POST["nombre"] . "] se ha insertado correctamente.')</script>";
                } else {
                    echo "<script>alert('¡El archivo subido no es una imagen!')</script>";
                }
            }
        }
        // Registrar usuario
        if (isset($_POST['registro'])) {
            $nombre = $_POST['nombre'];
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $email = $_POST['email'];
            $direccion = $_POST['direccion'];
            $perfil = $_POST['perfil'];
            $query = $connection->prepare("SELECT * FROM usuarios WHERE usuario=:usuario");
            $query->bindParam("usuario", $usuario, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                echo "<script>alert('¡El usuario [$usuario] ya se encuentra registrado!')</script>";
            }
            if ($query->rowCount() == 0) {
                $query = $connection->prepare("INSERT INTO usuarios(nombre,usuario,contrasena,email,direccion,perfil) VALUES (:nombre,:usuario,:password_hash,:email,:direccion,:perfil)");
                $query->bindParam("nombre", $nombre, PDO::PARAM_STR);
                $query->bindParam("usuario", $usuario, PDO::PARAM_STR);
                $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
                $query->bindParam("email", $email, PDO::PARAM_STR);
                $query->bindParam("direccion", $direccion, PDO::PARAM_STR);
                $query->bindParam("perfil", $perfil, PDO::PARAM_STR);
                $result = $query->execute();
                if ($result) {
                    header("Refresh:3; url=login.php");
                    echo "<script>alert('¡Usuario registrado correctamente!')</script>";
                } else {
                    echo "<script>alert('¡Algo ha ido mal!')</script>";
                }
            }
        }
        // Eliminar usuarios
        if (isset($_POST["eliminarUsuario"])) {
            if (isset($_POST["ids"])) {
                $ids = $_POST["ids"];
                foreach ($ids as $id) {
                    $eliminar = $connection->prepare('DELETE FROM usuarios WHERE id=:id');
                    $eliminar->bindParam("id", $id);
                    $eliminar->execute();
                }
                echo "<script>alert('Se han eliminado los usuarios con ID: ";
                foreach ($ids as $id) {
                    echo "$id ";
                }
                echo "correctamente.')</script>";
            }
        }
        ?>
        <div class="container-lg d-flex flex-column min-vh-100">
            <?php include("includes/header.php"); ?>
            <main class="row gy-2 mb-2">
                <div class="col-12">
                    <nav class="navbar navbar-expand">
                        <div class="nav navbar-nav">
                            <button type="button" id="btnGestionar" class="nav-item btn btn-primary">Gestionar Videojuegos</button>
                            <button type="button" id="btnInsertar" class="nav-item btn btn-primary ms-2">Insertar Videojuego</button>
                            <button type="button" id="btnRegistrar" class="nav-item btn btn-primary ms-2">Registrar Usuario</button>
                            <button type="button" id="btnEliminar" class="nav-item btn btn-primary ms-2">Gestionar Usuarios</button>
                        </div>
                    </nav>
                </div>
                <div id="contenido" class="col table-responsive">
                    <?php verGestionar() ?>
                </div>
            </main>
            <?php include("includes/footer.php"); ?>
        </div>
        <script type="text/javascript">
            const panel = document.getElementById("contenido");
            const btnGestionar = document.getElementById("btnGestionar");
            const btnInsertar = document.getElementById("btnInsertar");
            const btnRegistrar = document.getElementById("btnRegistrar");
            const btnEliminar = document.getElementById("btnEliminar");

            function mostrarGestionar() {
                panel.innerHTML = "<?php verGestionar(); ?>";
            }

            function mostrarInsertar() {
                panel.innerHTML = "<?php verInsertar(); ?>";
            }

            function mostrarRegistrar() {
                panel.innerHTML = "<?php verRegistrar(); ?>";
            }

            function mostrarEliminar() {
                panel.innerHTML = "<?php verEliminar(); ?>";
            }

            btnGestionar.addEventListener("click", mostrarGestionar);
            btnInsertar.addEventListener("click", mostrarInsertar);
            btnRegistrar.addEventListener("click", mostrarRegistrar);
            btnEliminar.addEventListener("click", mostrarEliminar);
        </script>
    </body>

    </html>
<?php
}
?>