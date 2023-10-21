<!DOCTYPE html>
<html>
<head>
    <title>Operaciones con Cadenas en PHP</title>
</head>
<body>
    <?php
    $frase = "Esta cadena tiene muchas letras";

    // La posición de la primera ocurrencia de la letra ‘a’.
    $posicionA = strpos($frase, 'a');
    echo "La primera ocurrencia de 'a' es $posicionA<br>";

    // La posición de la primera ocurrencia de la letra ‘m’.
    $posicionM = strpos($frase, 'm');
    echo "La primera ocurrencia de 'm' es $posicionM<br>";

    // La posición de la primera ocurrencia de la palabra “tiene”.
    $posicionTiene = strpos($frase, 'tiene');
    echo "La primera ocurrencia de 'tiene' es $posicionTiene<br>";

    // La primera ocurrencia desde el final de la letra ‘a’.
    $posicionAReversa = strrpos($frase, 'a');
    echo "La primera ocurrencia desde el final de 'a' es $posicionAReversa<br>";

    // La frase desde la aparición de la palabra “cadena” hasta el final.
    $posicionCadena = strpos($frase, 'cadena');
    $fraseDesdeCadena = substr($frase, $posicionCadena);
    echo "La frase desde la aparición de la palabra 'cadena' hasta el final es: $fraseDesdeCadena<br>";

    // La cadena desde el carácter 12 hasta el final.
    $substring12 = substr($frase, 12);
    echo "La cadena desde el carácter 12 hasta el final es: $substring12<br>";

    // La cadena devolviendo 6 caracteres desde el carácter 18.
    $substring18 = substr($frase, 18, 6);
    echo "La cadena devolviendo 6 caracteres desde el carácter 18 es: $substring18<br>";

    // La cadena devolviendo los 6 últimos caracteres.
    $last6 = substr($frase, -6);
    echo "La cadena devolviendo los 6 últimos caracteres es: $last6<br>";

    // La cadena desde la posición 26, contando desde atrás, 6 caracteres.
    $substring26 = substr($frase, -26, 6);
    echo "La cadena desde la posición 26, contando desde atrás, 6 caracteres es: $substring26<br>";

    // La cadena empezando en el carácter 4 y terminando en el 7 desde atrás.
    $substring4To7FromEnd = substr($frase, 3, -7);
    echo "La cadena empezando en el carácter 4 y terminando en el 7 desde atrás es: $substring4To7FromEnd<br>";

    // Imprimir las partes de la cadena.
    $partes = explode(' ', $frase);
    foreach ($partes as $parte) {
        echo $parte . "<br>";
    }
    ?>
</body>
</html>
