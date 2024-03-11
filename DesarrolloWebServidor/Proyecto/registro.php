<?php
include_once('config/config.php');
include_once('includes/funciones.php');
session_start();
if (isset($_POST['registro'])) {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $query = $connection->prepare("SELECT * FROM usuarios WHERE usuario=:usuario");
    $query->bindParam("usuario", $usuario, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        echo '<p class="error">¡El usuario [' . $usuario . '] ya se encuentra registrado!</p>';
    }
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO usuarios(nombre,usuario,contrasena,email,direccion) VALUES (:nombre,:usuario,:password_hash,:email,:direccion)");
        $query->bindParam("nombre", $nombre, PDO::PARAM_STR);
        $query->bindParam("usuario", $usuario, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("direccion", $direccion, PDO::PARAM_STR);
        $result = $query->execute();
        if ($result) {
            header("Refresh:3; url=login.php");
            echo '<p class="success">¡Usuario registrado correctamente!</p>';
        } else {
            echo '<p class="error">¡Algo ha ido mal!</p>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="<?php echo $_COOKIE["tema"]; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Videojuegos - Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container-lg d-flex flex-column min-vh-100">
        <?php include("includes/header.php"); ?>
        <main class="row gy-2 w-50 m-auto">
            <div class="col table-responsive">
                <form class="" name="formulario" action="admin.php" method="post" enctype="multipart/form-data">
                    <h1>Registrar usuario</h1>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td scope="row"><label for="" class="form-label">Nombre</label></td>
                                <td><input type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[a-zA-Z ]+" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td scope="row"><label for="usuario" class="form-label">Usuario</label></td>
                                <td><input type="text" name="usuario" id="usuario" pattern="[a-zA-Z0-9]+" placeholder="Usuario" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td scope="row"><label for="password" class="form-label">Contraseña</label></td>
                                <td><input type="password" name="password" id="password" placeholder="Contraseña" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td scope="row"><label for="email" class="form-label">Email</label></td>
                                <td><input type="email" name="email" id="email" placeholder="correo@electronico.com" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td scope="row"><label for="direccion" class="form-label">Dirección</label></td>
                                <td><input type="text" name="direccion" id="direccion" placeholder="Dirección" class="form-control" required /></td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="submit" name="registro" value="Registrar usuario" class="btn btn-primary" />
                    <input type="button" name="volverLogin" value="Volver" class="btn btn-primary" onclick="location.href='login.php'" />
                </form>
            </div>
        </main>
        <?php include("includes/footer2.php"); ?>
    </div>
</body>

</html>