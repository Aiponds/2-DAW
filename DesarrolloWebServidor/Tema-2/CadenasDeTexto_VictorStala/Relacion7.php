<!DOCTYPE html>
<html>
<head>
    <title>Repetir caracteres de una frase</title>
</head>
<body>
    <h1>Repetir caracteres de una frase</h1>
    <form method="post" action="">
        <label for="frase">Introduce una frase:</label>
        <input type="text" name="frase" id="frase" required><br><br>
        <input type="submit" name="repetir" value="Repetir">
    </form>

    <?php
    if (isset($_POST['repetir'])) {
        $frase = $_POST['frase'];
        $frase_repetida = '';

        // Recorrer cada caracter de la frase y repetirlo
        for ($i = 0; $i < strlen($frase); $i++) {
            $caracter = $frase[$i];
            $frase_repetida .= str_repeat($caracter, 2);
        }

        echo "<p>Frase original: $frase</p>";
        echo "<p>Frase repetida: $frase_repetida</p>";
    }
    ?>
</body>
</html>
