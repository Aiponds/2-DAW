<?php
function cambiarTema()
{
    if ($_COOKIE["tema"] == "light") {
        setcookie("tema", "dark");
        $_COOKIE["tema"] = "dark";
    } else {
        setcookie("tema", "light");
        $_COOKIE["tema"] = "light";
    }
}
if (isset($_POST["cambiarTema"])) {
    cambiarTema();
}

function verGestionar()
{
    echo "<form class='' name='formulario' action='admin.php' method='post' enctype='multipart/form-data'>";
    echo "<h1>Gestión de Videojuegos</h1><table class='table table-primary'><thead><tr><th scope='col'>ID</th><th scope='col'>Nombre</th><th scope='col'>Imagen</th><th scope='col'>Descripcion</th><th scope='col'>Precio</th><th scope='col'>Borrar</th></tr></thead>";
    $connection = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE, USER, PASSWORD);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $sql = "SELECT * FROM productos";
        $resultado = $connection->query($sql);

        while ($juego = $resultado->fetch(PDO::FETCH_OBJ)) {
            echo "<tr><td scope='row'>$juego->id</td><td>$juego->nombre</td><td><img class='img-fluid' alt='$juego->imagen' src='" . $juego->imagen . "'></td><td>$juego->descripcion</td><td>$juego->precio</td><td><input type='checkbox' name='ids[]' value='$juego->id'></td></tr>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    echo "</tbody></table><input type='submit' name='eliminar' value='Eliminar juegos marcados'></form>";
}

function verInsertar()
{
    echo "<form class='' name='formulario' action='admin.php' method='post' enctype='multipart/form-data'><h1>Inserción de Videojuegos</h1><table class='table'><tbody><tr><td scope='row'><label for='nombre' class='form-label'>Nombre:</label></td><td><input type='text' name='nombre' id='nombre' placeholder='Nombre' class='form-control' required></td></tr><tr><td scope='row'><label for='imagen'>Imagen:</label></td><td><input type='file' accept='image/*' name='imagen' id='imagen' class='form-control' required></td></tr><tr><td scope='row'><label for='descripcion' class='form-label'>Descripcion:</label></td><td><textarea name='descripcion' id='descripcion' class='form-control' rows='3' required>Descripción del videojuego.</textarea></td></tr><tr><td scope='row'><label for='precio' class='form-label'>Precio:</label></td><td><input type='number' name='precio' id='precio' min='0' pattern='^\d*(\.\d{0,2})?$' placeholder='0,00' step='0.01' class='form-control' required></td></tr></tbody></table><input type='submit' name='insertar' value='Insertar juego'></form>";
}

function verRegistrar()
{
    echo "<form class='' name='formulario' action='admin.php' method='post' enctype='multipart/form-data'><h1>Registrar usuario</h1><table class='table'><tbody><tr><td scope='row'><label for='' class='form-label'>Nombre</label></td><td><input type='text' name='nombre' id='nombre' placeholder='Nombre' pattern='[a-zA-Z ]+' class='form-control' required /></td></tr><tr><td scope='row'><label for='usuario' class='form-label'>Usuario</label></td><td><input type='text' name='usuario' id='usuario' pattern='[a-zA-Z0-9]+' placeholder='Usuario' class='form-control' required /></td></tr><tr><td scope='row'><label for='password' class='form-label'>Contraseña</label></td><td><input type='password' name='password' id='password' placeholder='Contraseña' class='form-control' required /></td></tr><tr><td scope='row'><label for='email' class='form-label'>Email</label></td><td><input type='email' name='email' id='email' placeholder='correo@electronico.com' class='form-control' required /></td></tr><tr><td scope='row'><label for='direccion' class='form-label'>Dirección</label></td><td><input type='text' name='direccion' id='direccion' placeholder='Dirección' class='form-control' required /></td></tr><tr><td scope='row'><label for='perfil' class='form-label'>Perfil</label></td><td><select name='perfil' id='perfil' class='form-select'><option value='normal' selected>Normal</option><option value='administrador'>Administrador</option></select></td></tr></tbody></table><input type='submit' name='registro' value='Registrar usuario' class='btn btn-primary' /></form>";
}

function verEliminar()
{
    echo "<form class='' name='formulario' action='admin.php' method='post' enctype='multipart/form-data'>";
    echo "<h1>Eliminar Usuarios</h1><table class='table table-primary'><thead><tr><th scope='col'>ID</th><th scope='col'>Nombre</th><th scope='col'>Usuario</th><th scope='col'>Email</th><th scope='col'>Dirección</th><th scope='col'>Perfil</th><th scope='col'>Borrar</th></tr></thead>";
    $connection = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE, USER, PASSWORD);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $sql = "SELECT * FROM usuarios";
        $resultado = $connection->query($sql);

        while ($usuario = $resultado->fetch(PDO::FETCH_OBJ)) {
            echo "<tr><td scope='row'>$usuario->id</td><td>$usuario->nombre</td><td>$usuario->usuario</td><td>$usuario->email</td><td>$usuario->direccion</td><td>$usuario->perfil</td><td><input type='checkbox' name='ids[]' value='$usuario->id'></td></tr>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    echo "</tbody></table><input type='submit' name='eliminarUsuario' value='Eliminar usuarios marcados'></form>";
}
