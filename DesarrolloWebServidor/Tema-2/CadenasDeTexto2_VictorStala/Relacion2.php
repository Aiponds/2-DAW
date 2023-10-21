<!DOCTYPE html>
<html>
<head>
    <title>Operaciones con Cadenas en PHP</title>
</head>
<body>
    <h1>Operaciones con Cadenas en PHP</h1>
    <?php
    $frase = "Bienvenidos al a aventura de aprender PHP en 30 horas";

    // Mostrar la parte central de la frase
    $longitud = strlen($frase);
    $mitad = $longitud / 2;
    $parteCentral = substr($frase, $mitad - 5, 10);
    echo "Parte central de la frase: $parteCentral<br>";

    // Averiguar la posición de la palabra PHP
    $posicionPHP = strpos($frase, "PHP");
    echo "La palabra 'PHP' se encuentra en la posición $posicionPHP<br>";

    // Reemplazar la palabra "aventura" por "<b>misión</b>"
    $fraseModificada = str_replace("aventura", "<b>misión</b>", $frase);
    echo "Frase modificada: $fraseModificada<br>";
    ?>
</body>
</html>
