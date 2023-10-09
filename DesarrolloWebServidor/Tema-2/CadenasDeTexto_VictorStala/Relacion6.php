<!DOCTYPE html>
<html>
<head>
    <title>Mostrar número en binario y octal</title>
</head>
<body>
    <h1>Mostrar número en binario y octal</h1>
    <form method="post" action="">
        <label for="numero">Introduce un número:</label>
        <input type="number" name="numero" id="numero" required><br><br>
        <input type="submit" name="mostrar" value="Mostrar">
    </form>

    <?php
    if (isset($_POST['mostrar'])) {
        $numero = $_POST['numero'];

        // Mostrar el número en binario y octal utilizando printf
        printf("Número en binario: %b<br>", $numero);
        printf("Número en octal: %o<br>", $numero);
    }
    ?>
</body>
</html>
