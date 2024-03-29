<?php
// Incluyo externamente la conexión a la base de datos.
include_once('config/config.php');
session_start();

$tema = getTemaCookie();

// Verifica si se ha enviado un formulario para cambiar el tema
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tema'])) {
    $tema = ($tema === 'light') ? 'dark' : 'light';
    setTemaCookie($tema);
}

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
            echo '<center><p class="error">¡Usuario o contraseña incorrectos!</p></center>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo $tema; ?>.css">
</head>

<body>
    <div class="container-lg">
        <div class="row">
            <div class="col-12">
                <h1>Iniciar sesión</h1>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <label>Cambiar Tema:</label>
                    <button type="submit" name="tema" value="tema">Cambiar Tema</button>
                </form>
            </div>
        </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="loginFormulario">
            <div class="row">
                <label for="usuario" class="col-6">Usuario</label>
                <div class="col-6">
                    <input type="text" name="usuario" id="usuario" placeholder="Usuario" required />
                </div>
            </div>
            <div class="row">
                <label for="usuario" class="col-6">Contraseña</label>
                <div class="col-6">
                    <input type="password" name="password" id="password" placeholder="Contraseña" required />
                </div>
            </div>
            <div class="row">
                <div class="col-6"></div>
                <div class="col-6">
                    <button type="submit" name="login" value="login">Iniciar sesión</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>