<!DOCTYPE html>
<html>
<head>
    <title>Mostrar las dos primeras palabras de una frase</title>
</head>
<body>
    <h1>Mostrar las dos primeras palabras de una frase</h1>
    <form method="post" action="">
        <label for="frase">Introduce una frase:</label>
        <input type="text" name="frase" id="frase" required><br><br>
        <input type="submit" name="mostrar" value="Mostrar">
    </form>

    <?php
    if (isset($_POST['mostrar'])) {
        $frase = $_POST['frase'];

        // Dividir la frase en palabras
        $palabras = explode(' ', $frase);

        // Mostrar las dos primeras palabras si existen
        if (count($palabras) >= 2) {
            $primeras_dos_palabras = $palabras[0] . ' ' . $palabras[1];
            echo "<p>Las dos primeras palabras de la frase son: $primeras_dos_palabras</p>";
        } else {
            echo "<p>La frase no contiene al menos dos palabras.</p>";
        }
    }
    ?>
</body>
</html>
