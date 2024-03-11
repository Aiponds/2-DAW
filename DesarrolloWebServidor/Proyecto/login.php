<?php
include_once('config/config.php');
include_once('includes/funciones.php');
session_start();
if (isset($_POST['login'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $query = $connection->prepare("SELECT * FROM usuarios WHERE usuario=:usuario");
    $query->bindParam("usuario", $usuario, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">¡Usuario o contraseña incorrectos!</p>';
    } else {
        if (password_verify($password, $result['contrasena'])) {
            $_SESSION['usuario'] = $result['usuario'];
            $_SESSION['perfil'] = $result['perfil'];
            if ($_SESSION['perfil'] == 'administrador') {
                header("Location:admin.php");
                exit;
            } else {
                header("Location:index.php");
                exit;
            }
        } else {
            echo '<p class="error">¡Usuario o contraseña incorrectos!</p>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="<?php echo $_COOKIE["tema"]; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Videojuegos - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container-lg d-flex flex-column min-vh-100">
        <?php include("includes/header.php"); ?>
        <div class="row w-50 ms-auto me-auto mt-auto mb-2">
            <div class="col">
                <h1>Iniciar sesión</h1>
            </div>
        </div>
        <form class="w-50 ms-auto me-auto mb-auto mt-2" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="formulariologin">
            <div class="mb-3 row">
                <label for="usuario" class="col-4 col-form-label">Usuario</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" pattern="[a-zA-Z0-9]+" required />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="usuario" class="col-4 col-form-label">Contraseña</label>
                <div class="col-8">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required />
                </div>
            </div>
            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn btn-primary" name="login" value="login">Iniciar sesión</button>
                    <button type="button" class="btn btn-primary" name="registrarse" value="registrarse" onclick="location.href='registro.php'">Registrarse</button>
                </div>
            </div>
        </form>
        <?php include("includes/footer2.php"); ?>
    </div>
</body>

</html>