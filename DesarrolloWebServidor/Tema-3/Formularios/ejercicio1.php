<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
        form {
            border: 1px dotted blue;
        }

        tr>td:first-child {
            padding-right: 100px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2 style="color: blue;">Formulario Simple</h2>
    <h3 style="font-style: italic;">Búsqueda de canciones</h3>
    <form action="post">
        <table>
            <tr>
                <td><label for="busqueda">Texto a buscar:</label></td>
                <td><input type="text" name="busqueda" id="busqueda"><br></td>
            </tr>
            <tr>
                <td><label for="">Buscar en:</label></td>
                <td>
                    <input type="radio" name="titulos" id="titulos">
                    <label for="titulos">Titulos de canción</label>
                    <input type="radio" name="album" id="album">
                    <label for="album">Nombres de álbum</label>
                    <input type="radio" name="ambos" id="ambos">
                    <label for="ambos">Ambos campos</label>
                </td>
            </tr>
            <tr>
                <td><label for="genero">Género musical:</label></td>
                <td><select name="genero" id="genero">
                        <option value="todos">Todos</option>
                        <option value="acustica">Acústica</option>
                        <option value="bandasonora">Banda Sonora</option>
                        <option value="blues">Blues</option>
                        <option value="electronica">Electrónica</option>
                        <option value="folk">Folk</option>
                        <option value="jazz">Jazz</option>
                        <option value="newage">New Age</option>
                        <option value="pop">Pop</option>
                        <option value="rock">Rock</option>
                    </select></td>
            </tr>
            <tr>
                <td><a href="./ejercicio1-resultados.php">
                        <input type="button" value="Buscar">
                    </a></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>

</html>