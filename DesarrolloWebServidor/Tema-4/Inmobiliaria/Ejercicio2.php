<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_POST["titulo"])) {
    echo "Datos enviados correctamente";
    $titulo = $_POST["titulo"];
    $texto = $_POST["texto"];
    $categoria = $_POST["categoria"];
    $llamadaBD = new mysqli("localhost", "dwes", "abc123.", "inmobiliaria");
    $fecha= date("Y-m-d");

    // Verificar si hay errores en la conexión
    if ($llamadaBD->connect_errno == null) {
        // Preparar la consulta
        $consulta = $llamadaBD->prepare("INSERT INTO noticias (titulo, texto, categoria, fecha) VALUES (?, ?, ?, ?)");
        // Vincular los parámetros y ejecutar la consulta
        $consulta->bind_param("ssss", $titulo, $texto, $categoria, $fecha);
        $consulta->execute();
    
        // Verificar si la consulta se ejecutó correctamente
        if ($consulta->affected_rows > 0) {
            echo "<h1>Registro insertado correctamente</h1>"."<br>";
        } else {
            echo "Error al insertar el registro: " . $llamadaBD->error;
        }

        // Cerrar la consulta
        $consulta->close();
        // No cerrar la conexión aquí, ya que podríamos necesitarla más adelante
    } else {
        echo "<h1>Conexión fallida</h1>";
    }
} else {
?>
<!-- Formulario HTML -->
<form action="./Ejercicio2.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <label for="titulo">Título:* </label>
        <input type="text" name="titulo" id="titulo" required>
        <br>
        <label for="texto">Texto:* </label>
        <textarea rows="5" cols="30" name="texto" id="texto" required></textarea>
        <br>
        <label for="categoria">Categoría: </label>
        <select name="categoria" id="categoria">
            <option value="ofertas">ofertas</option>
            <option value="promociones">promociones</option>
        </select>
        <br>
        <label for="archivo">Imagen: </label>
        <input type="file" name="archivo" id="archivo">
        <br><br>
        <button type="submit" name="insertar">Insertar noticia</button>
    </fieldset>
</form>
<?php
}
?>


</body>
</html>