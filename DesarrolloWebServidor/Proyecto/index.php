<?php
// Incluyo externamente la conexión a la base de datos.
include_once('config/config.php');
session_start();

if (isset($_COOKIE['tema']) && $_COOKIE['tema'] === 'dark') {
    echo '<script>document.body.classList.add("dark-mode");</script>';
}

// Si la sesión no ha sido iniciada, envía el usuario al inicio de sesión.
// Si la sesión coincide con el perfil de administrador, lo reenvía a su página de administrador.
// Si no cumple ninguna, la sesión es del perfil usuario, por lo que le carga la página del usuario en este archivo.
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
        <link rel="stylesheet" href="styles.css">
        <script>
            function cambiarTema() {
                if (document.body.classList.contains('dark-mode')) {
                    document.body.classList.remove('dark-mode');
                    setCookie('tema', 'light', 365);
                } else {
                    document.body.classList.add('dark-mode');
                    setCookie('tema', 'dark', 365);
                }
            }

            function setCookie(name, value, days) {
                var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "") + expires + "; path=/";
            }
        </script>
    </head>

    <body>
        <div class="container-lg">
            <main class="row">
                <button type="button" onclick="cambiarTema()">Cambiar tema</button>
                <?php
                try {
                    $sql = "SELECT id, nombre, imagen, descripcion, precio FROM productos";
                    $resultado = $connection->query($sql);
                    // Recoge todos los productos de la base de datos y los añade al documento html.
                    foreach ($resultado as $madera) {
                        // Concatenar la ruta de la carpeta "img" antes de la ruta de la imagen
                        $ruta_imagen = "./img/" . $madera['imagen'];
                        echo "<div class='producto'>";
                        echo "<img src='" . $ruta_imagen . "' alt='" . $madera['nombre'] . "'>";
                        echo "<h4>" . $madera['nombre'] . "</h4>";
                        echo "<p>" . $madera['descripcion'] . "</p>";
                        echo "<div class='precio'>" . $madera['precio'] . " €</div>";
                        echo "<form method='post' action='{$_SERVER['PHP_SELF']}' class='formulario-carrito'>";
                        echo "<input type='hidden' name='producto_id' value='{$madera['id']}'>";
                        echo "<button type='submit' name='agregar_carrito' class='btn btn-primary'>Añadir al carrito</button>";
                        echo "</form>";
                        echo "</div>";
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            </main>
        </div>

        <!-- Mostrar carrito -->
        <div class="container-lg">
            <h2>Carrito de Compras</h2>
            <?php
            if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                echo "<ul>";
                foreach ($_SESSION['carrito'] as $producto_id) {
                    // Consultar la base de datos para obtener los detalles del producto
                    $sql_detalle = "SELECT nombre, precio FROM productos WHERE id = :id";
                    $stmt_detalle = $connection->prepare($sql_detalle);
                    $stmt_detalle->bindParam(':id', $producto_id);
                    $stmt_detalle->execute();
                    $producto_detalle = $stmt_detalle->fetch(PDO::FETCH_ASSOC);

                    // Mostrar el nombre y el precio del producto en el carrito
                    echo "<li>{$producto_detalle['nombre']} - {$producto_detalle['precio']} €</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No hay productos en el carrito.</p>";
            }
            ?>
        </div>

        <footer>
            <div>
                <button type="button" onclick="location.href='logout.php'">Cerrar sesión</button>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <button type="submit" name="limpiar_carrito" class="btn btn-danger">Limpiar carrito</button>
                    <button type="submit" name="finalizar_compra" class="btn btn-success">Finalizar compra</button>
                </form>
            </div>
        </footer>
    </body>

    </html>
    <?php
}

// Verificar si se ha pulsado el botón "Añadir al carrito"
if (isset($_POST['agregar_carrito'])) {
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }
    $producto_id = $_POST['producto_id'];
    // Verificar si el producto ya está en el carrito
    if (!in_array($producto_id, $_SESSION['carrito'])) {
        // Agregar el producto al carrito
        $_SESSION['carrito'][] = $producto_id;
    }
}

// Verificar si se ha pulsado el botón "Limpiar carrito"
if (isset($_POST['limpiar_carrito'])) {
    unset($_SESSION['carrito']);
}

// Verificar si se ha pulsado el botón "Finalizar compra"
if (isset($_POST['finalizar_compra'])) {
    echo "<p class='compra'>¡Gracias por su compra!</p>";
    unset($_SESSION['carrito']);
}
?>