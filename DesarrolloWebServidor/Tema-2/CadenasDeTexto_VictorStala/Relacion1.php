<!DOCTYPE html>
<html>
<head>
    <title>Comprobar si las palabras riman</title>
</head>
<body>
    <h1>Comprobar si las palabras riman</h1>
    <form method="post" action="">
        <label for="palabra1">Palabra 1:</label>
        <input type="text" name="palabra1" id="palabra1" required><br><br>

        <label for="palabra2">Palabra 2:</label>
        <input type="text" name="palabra2" id="palabra2" required><br><br>

        <input type="submit" name="comprobar" value="Comprobar">
    </form>

    <?php
    if (isset($_POST['comprobar'])) {
        $palabra1 = strtolower($_POST['palabra1']);
        $palabra2 = strtolower($_POST['palabra2']);

        // Obtener las tres últimas letras de cada palabra
        $ultimas_letras_palabra1 = substr($palabra1, -3);
        $ultimas_letras_palabra2 = substr($palabra2, -3);

        if ($ultimas_letras_palabra1 == $ultimas_letras_palabra2) {
            echo "<p>Las palabras riman.</p>";
        } elseif (substr($ultimas_letras_palabra1, -2) == substr($ultimas_letras_palabra2, -2)) {
            echo "<p>Las palabras riman un poco.</p>";
        } else {
            echo "<p>Las palabras no riman.</p>";
        }
    }
    ?>
</body>
</html>