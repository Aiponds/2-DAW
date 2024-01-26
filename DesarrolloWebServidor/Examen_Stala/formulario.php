<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body>
    <h1>Formulario</h1>
    <form action="./formulario-resultados.php" method="POST" enctype="multipart/form-data">
        <!-- Compruebo que los campos sean obligatorios en el php-->
        <label for="nombre">Nombre*:</label>
        <input type="text" name="nombre" id="nombre"><br>
        <label for="apellidos">Apellidos*: </label>
        <input type="text" name="apellidos" id="apellidos"><br>
        <label for="dni">DNI*: </label>
        <input type="text" name="dni" id="dni"><br>
        <label for="sexo">Sexo: </label>
        <input type="radio" name="sexo" id="sexo" value="hombre">
        <label for="hombre">Hombre</label>
        <input type="radio" name="sexo" id="sexo" value="mujer">
        <label for="mujer">Mujer</label><br>
        <label for="meritos">Meritos:</label>
        <input type="checkbox" name="meritos" id="carnet">
        <label for="carnet">Carnet</label>
        <input type="checkbox" name="meritos" id="pensionista">
        <label for="pensionista">Pensionista</label>
        <input type="checkbox" name="meritos" id="experiencia">
        <label for="experiencia">20 años (o más) de experiencia</label>
        <input type="checkbox" name="meritos" id="discapacidad">
        <label for="discapacidad">Discapacidad superior al 33%</label><br>
        <label for="pais">Pais de residencia</label>
        <select name="pais" id="pais">
            <option value="españa">España</option>
            <option value="portugal">Portugal</option>
            <option value="francia">Francia</option>
        </select><br>
        <label for="comentario">Comentario:</label><br>
        <textarea name="comentario" id="comentario" cols="30" rows="10"></textarea><br>
        <label for="foto">Foto carnet*</label>
        <input type="file" name="foto" id="foto"><br><br>
        <input type="submit" value="Enviar" name="enviar">
        <hr>
    </form>
    <?php
    // Nombre del archivo del contador
    $archivo_entrada = './contador.txt';
    // Nombre del archivo de salida
    $archivo_salida = 'contador.txt';
    // Leemos el contenido y guardamos en el contador. Luego le sumamos 1.
    $contador = file_get_contents($archivo_entrada);
    $contador++;
    // Guardar el contenido en el archivo de salida
    file_put_contents($archivo_salida, $contador);
    // Mostramos el numero actual del contador
    echo $contador;
    ?>
</body>

</html>