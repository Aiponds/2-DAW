<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
</head>

<body>
    <h1>Resultados</h1>

    <?php
    $errores = "";
    //Funcion para procesar los datos y evitar fallos.
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Comprobamos que sea POST el metodo
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_REQUEST['enviar'])) {
            //Comprobamos que los campos obligatorios estén rellenos.
            if (!empty($_REQUEST['nombre'])) {
                $nombre = test_input(($_REQUEST['nombre']));
            } else {
                $errores .= "El campo nombre es obligatorio.<br>";
            }
            if (!empty($_REQUEST['apellidos'])) {
                $apellidos = test_input(($_REQUEST['apellidos']));
            } else {
                $errores .= "El campo apellidos es obligatorio.<br>";
            }
            if (!empty($_REQUEST['dni'])) {
                $DNI = test_input(($_REQUEST['dni']));
            } else {
                $errores .= "El campo DNI es obligatorio.<br>";
            }
            if (!empty($_FILES['foto']) && isset($_FILES['foto'])) {
                $foto = $_FILES['foto'];
                // Obtiene la extensión del archivo
                $extension = pathinfo($foto['name']);
                // Comprueba si la extensión es jpg
                //Utilizo @ porque al estar vacio da 'Warning' pero no un error.
                if (@($extension['extension']) == 'jpg') {
                    // Define la ruta del archivo de destino
                    $destino = './img/foto.jpg';

                    // Intenta mover el archivo subido al destino
                    if (move_uploaded_file($foto['tmp_name'], $destino)) {
                        move_uploaded_file($foto['tmp_name'], $destino);
                    } else {
                        $errores .= "Hubo un error al subir el archivo.";
                    }
                } else {
                    $errores .= "El campo Foto carnet es obligatorio.";
                }
            } else {
                $errores .= "El campo Foto carnet es obligatorio.<br>";
            }
            $dni = (!empty($_REQUEST['dni'])) ? test_input($_REQUEST['dni']) : "";
            $sexo = (!empty($_REQUEST['sexo'])) ? test_input($_REQUEST['sexo']) : "";
            $meritos = (!empty($_REQUEST['meritos[]'])) ? (implode(",", test_input($_REQUEST['meritos[]']))) : "";
            $pais = (!empty($_REQUEST['pais'])) ? test_input($_REQUEST['pais']) : "";
            $comentario = (!empty($_REQUEST['comentario'])) ? test_input($_REQUEST['comentario']) : "";
            //Si no hay ningun error procedemos mostrando los datos. Si hay errores, los mostramos
            if (empty($errores)) {
                echo "<br>Nombre: " . $nombre . " <br>" . "Apellidos: " . $apellidos . "<br>" . "DNI: " . $dni . "<br>" . "Sexo: " . $sexo . "<br>Meritos: " . $meritos . "<br>" . "Pais: " . $pais . "<br>" . "Comentario: " . $comentario . "<br>" . "Foto carnet: " . "<br><img src=\"./img/foto.jpg\" alt=\"Imagen\">";
            } else {
                echo $errores;
            }
        }
    }

    ?>
    <br>
    <a href="./formulario.php">Volver al formulario.</a>
</body>

</html>