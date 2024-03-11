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
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administración de la web</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    </head>

    <body>
        <?php
        // Eliminar tipo de leña
    
        // Insertar tipo de leña
    
        // Registrar usuario
    
        // Eliminar usuarios
    
        ?>
        <div class="container-lg">
            <main class="row">
                <div class="col-12">

                </div>
            </main>
        </div>
    </body>

    </html>
    <?php
}
?>