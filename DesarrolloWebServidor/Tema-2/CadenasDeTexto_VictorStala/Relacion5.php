<!DOCTYPE html>
<html>
<head>
    <title>Contar letras 'a' y generar un array de frecuencias</title>
</head>
<body>
    <h1>Contar letras 'a' y generar un array de frecuencias</h1>
    <form method="post" action="">
        <label for="frase">Introduce una frase:</label>
        <input type="text" name="frase" id="frase" required><br><br>
        <input type="submit" name="contar" value="Contar">
    </form>

    <?php
    if (isset($_POST['contar'])) {
        $frase = $_POST['frase'];

        // Contar el número de letras 'a' en la frase
        $numero_de_a = substr_count(strtolower($frase), 'a');

        echo "<p>El número de letras 'a' en la frase es: $numero_de_a</p>";

        // Generar un array de frecuencias de letras
        $frecuencias = array_count_values(str_split(strtolower($frase)));

        echo "<p>Array de frecuencias de letras:</p>";
        echo "<pre>";
        print_r($frecuencias);
        echo "</pre>";
    }
    ?>
</body>
</html>
