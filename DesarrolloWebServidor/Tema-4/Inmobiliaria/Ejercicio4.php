<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $llamadaBD=new mysqli("localhost","dwes","abc123.","inmobiliaria");
        if (isset($_POST["enviar"])) {
            
    ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <h1>Consulta de noticias</h1>
            <label for="titulo">Mostrar noticias por catergoría: </label>
            <select name="categoria" id="categoria">
                <option value="todas">Todas las categorías</option>
                <option value="promociones">Promociones</option>
                <option value="ofertas">Ofertas</option>
                <option value="costas">costas</option>
            </select>
            <input type="submit" name="enviar" value="actualizar">
        </form>
    <?php
        // Verificar si hay errores en la conexión
        if ($llamadaBD->connect_errno==null) {
            echo "<h1> Conexión correcta </h1>";     
            if ($_POST["categoria"]!="todas") {
                $consulta=mysqli_query($llamadaBD,"SELECT * FROM noticias WHERE categoria =" .$_POST["categoria"] ."ORDER BY fecha DESC");
                echo "<table>";
                echo"<th>título</th>";
                echo"<th>texto</th>";
                echo"<th>categoria</th>";
                echo"<th>fecha</th>";
                while ($registro = mysqli_fetch_array($consulta)) {
                    echo"<tr>";
                    echo "<td>".$registro['titulo']."</td>"."<td>".$registro['texto']."</td>"."<td>".$registro['categoria']."</td>"."<td>".$registro['fecha']."</td>" ;
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_close($llamadaBD);
            }else {
                echo "<h1>Conexión fallida </h1>";
            }
            } else {
                $consulta=mysqli_query($llamadaBD,"SELECT * FROM noticias ORDER BY fecha DESC");
                echo "<table>";
                echo"<th>título</th>";
                echo"<th>texto</th>";
                echo"<th>categoria</th>";
                echo"<th>fecha</th>";
                while ($registro = mysqli_fetch_array($consulta)) {
                    echo"<tr>";
                    echo "<td>".$registro['titulo']."</td>"."<td>".$registro['texto']."</td>"."<td>".$registro['categoria']."</td>"."<td>".$registro['fecha']."</td>" ;
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_close($llamadaBD);
            }
            
            $consulta=mysqli_query($llamadaBD,"SELECT * FROM noticias WHERE categoria =" .$_POST["categoria"] ."ORDER BY fecha DESC");
            echo "<table>";
            echo"<th>título</th>";
            echo"<th>texto</th>";
            echo"<th>categoria</th>";
            echo"<th>fecha</th>";
            while ($registro = mysqli_fetch_array($consulta)) {
                echo"<tr>";
                echo "<td>".$registro['titulo']."</td>"."<td>".$registro['texto']."</td>"."<td>".$registro['categoria']."</td>"."<td>".$registro['fecha']."</td>" ;
                echo "</tr>";
            }
            echo "</table>";
            mysqli_close($llamadaBD);
        }else {
            echo "<h1>Conexión fallida </h1>";
        
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <h1>Consulta de noticias</h1>
        <label for="titulo">Mostrar noticias por catergoría: </label>
        <select name="categoria" id="categoria">
            <option value="todas">Todas las categorías</option>
            <option value="promociones">Promociones</option>
            <option value="ofertas">Ofertas</option>
            <option value="costas">costas</option>
        </select>
        <input type="submit" name="enviar" value="actualizar">
    </form>
    <?php
            // Verificar si hay errores en la conexión
            if ($llamadaBD->connect_errno==null) {
                echo "<h1> Conexión correcta </h1>";     
                $consulta=mysqli_query($llamadaBD,"SELECT * FROM noticias ORDER BY fecha DESC");
                echo "<table>";
                echo"<th>título</th>";
                echo"<th>texto</th>";
                echo"<th>categoria</th>";
                echo"<th>fecha</th>";
                while ($registro = mysqli_fetch_array($consulta)) {
                    echo"<tr>";
                    echo "<td>".$registro['titulo']."</td>"."<td>".$registro['texto']."</td>"."<td>".$registro['categoria']."</td>"."<td>".$registro['fecha']."</td>" ;
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_close($llamadaBD);
            }else {
                echo "<h1>Conexión fallida </h1>";
            }
        }
    ?>

</body>
</html>