<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria - Eliminar</title>
</head>

<body>
    <?php
    if (isset($_POST["eliminar"])) {
        if (isset($_POST["ids"])) {
            $ids = $_POST["ids"];
            @$dwes = new mysqli('localhost', 'dwes', 'abc123.', 'inmobiliaria');
            $error = $dwes->connect_errno;
            if ($error == null) {
                foreach ($ids as $id) {
                    $eliminar = $dwes->stmt_init();
                    $eliminar->prepare('DELETE FROM noticias WHERE id=?');
                    $eliminar->bind_param('s', $id);
                    $eliminar->execute();
                    $eliminar->close();
                }
                $dwes->close();
                echo "Se han eliminado las noticias: ";
                foreach ($ids as $id) {
                    echo "$id ";
                }
                echo "correctamente.";
            }
        }
    }
    ?>
    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <h1>Eliminación de noticias</h1>
        <table>
            <tr>
                <th>Título</th>
                <th>Texto</th>
                <th>Categoría</th>
                <th>Fecha</th>
                <th>Imagen</th>
                <th>Borrar</th>
            </tr>
            <?php
            @$dwes = new mysqli('localhost', 'dwes', 'abc123.', 'inmobiliaria');
            $error = $dwes->connect_errno;
            if ($error == null) {
                $resultado = $dwes->query('SELECT titulo, texto, categoria, fecha, imagen, id FROM noticias ORDER BY fecha DESC');
                $noticia = $resultado->fetch_object();
                while ($noticia != null) {
                    print "<tr><td>$noticia->titulo</td><td>$noticia->texto</td><td>$noticia->categoria</td><td>$noticia->fecha</td><td>$noticia->imagen</td><td><input type='checkbox' name='ids[]' value='$noticia->id'></td></tr>";
                    $noticia = $resultado->fetch_object();
                }
                $dwes->close();
            }
            ?>
        </table><br>
        <input type="submit" name="eliminar" value="Eliminar noticias marcadas">
    </form>
</body>
p
</html>