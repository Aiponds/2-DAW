<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* General */
        BODY {
            font-family: verdana, arial, sans-serif;
            font-size: 10pt;
        }

        /* Contenido */
        H1 {
            font-size: 16pt;
            font-weight: bold;
            color: #0066CC;
        }

        H2 {
            font-size: 12pt;
            font-weight: bold;
            font-style: italic;
            color: black;
        }

        H3 {
            font-size: 10pt;
            font-weight: bold;
            color: black;
        }

        /* Formulario */
        FORM.borde {
            border: 1px dotted #0066CC;
            padding: 0.5em 0.2em;
            width: 80%;
        }

        FORM P {
            clear: left;
            margin: 0.2em;
            padding: 0.1em;
        }

        FORM P LABEL {
            float: left;
            width: 25%;
            font-weight: bold;
        }

        .error {
            color: red;
        }

        /* Tablas */
        TH {
            font-size: 10pt;
            font-weight: bold;
            color: white;
            background: #0066CC;
            text-align: left;
        }

        TD {
            font-size: 10pt;
            background: #CCCCCC;
        }

        TD.derecha {
            font-size: 10pt;
            text-align: right;
            background: #FFFFFF;
        }

        TD.izquierda {
            font-size: 10pt;
            text-align: left;
            background: #FFFFFF;
        }
    </style>
</head>
<body>

<h2>Consulta de Noticias</h2>

<table>
    <tr>
        <th>Título</th>
        <th>Texto</th>
        <th>Categoría</th>
        <th>Fecha</th>
        <th>Imagen</th>
    </tr>
    <?php
        $llamadaBD=new mysqli("localhost","root","1507","inmobiliaria");
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
</table>
</body>
</html>