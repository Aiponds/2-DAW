<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen PHP</title>
    <link rel="stylesheet" href="dwes.css">
</head>

<body>
    <select name="filtroCurso" id="curso">
        <option value="todos">Todos</option>
        <option value="primero">1</option>
        <option value="segundo">2</option>
    </select>
    <select name="filtroLetra" id="letra">
        <option value="todos">Todos</option>
        <option value="a">A</option>
        <option value="b">B</option>
    </select>
    <button type="button" onclick="<?php echo 'mostrarTabla()'; ?>">Filtrar por curso y letra (WIP)</button>
    <table>
        <tr>
            <th>N_Expediente</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Fecha Nacimiento</th>
            <th>Curso</th>
            <th>Letra</th>
        </tr>
        <?php
        // Para el punto extra ;)
        include 'fecha.php';

        function mostrarTabla()
        {
            $conexion = new mysqli("localhost", "instituto", "instituto", "Instituto");
            if ($conexion->connect_errno == 0) {
                $consulta = $conexion->prepare("SELECT * FROM Alumnos ORDER BY Apellidos ASC");
                $consulta->execute();
                $resultados = $consulta->get_result();

                // Recorremos los resultados y los mostramos en la tabla
                while ($fila = $resultados->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila['N_expdte'] . "</td>";
                    echo "<td>" . $fila['Nombre'] . "</td>";
                    echo "<td>" . $fila['Apellidos'] . "</td>";
                    // Hago uso de la funcion date2string externa.
                    echo "<td>" . date2string($fila['Fecha_nac']) . "</td>";
                    echo "<td>" . $fila['Curso'] . "</td>";
                    echo "<td>" . $fila['Letra'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "No se ha podido conectar a la base de datos";
            }

            mysqli_close($conexion);
        }
        mostrarTabla();
        ?>
    </table>
</body>

</html>