<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $llamadaBD=new mysqli("localhost","dwes","abc123","inmobiliaria");
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

    ?>
</body>
</html>