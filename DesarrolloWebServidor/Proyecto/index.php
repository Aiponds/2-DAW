<?php
//Incluyo externamente la conexion a la base de datos.
include_once('config/config.php');
session_start();

//Si la sesión no ha sido iniciada, envia el usuario a el inicio de sesión.
//Si la sesión coincide con el perfil de administrador, lo reenvía a su página de administrador.
//Si no cumple ninguna, la sesión es del perfil usuario, por lo que le carga la página del usuario en este archivo.
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
} else {
    if ($_SESSION['perfil'] == 'administrador') {
        header('Location: admin.php');
        exit;
    }
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tienda de Leña</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    </head>

    <body>
        <div class="container-lg">
            <main class="row">
                <?php
                try {
                    $sql = "SELECT nombre, imagen, descripcion, precio FROM productos";
                    $resultado = $connection->query($sql);
                    //Recoge todos los productos de la base de datos y los añade al documento html.
                    while ($madera = $resultado->fetch(PDO::FETCH_OBJ)) {
                        echo "<div>" . "<div>" . "<img src='" . $madera->imagen . "' class='card-img-top' alt='" . $madera->nombre . "'>";
                        echo "<div>". "<h4>" . $madera->nombre . "</h4>";
                        echo "<p>" . $madera->descripcion . "</p>";
                        echo "<div><a href='#' class='btn btn-primary'>Comprar</a>" . "<span class='btn'>" . $madera->precio . " €</span></div></div></div></div>";
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            </main>
        </div>
    </body>

    </html>
    <?php
}
?>