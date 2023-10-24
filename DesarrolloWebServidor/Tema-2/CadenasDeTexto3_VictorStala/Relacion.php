<!DOCTYPE html>
<html>
<head>
    <title>Ejercicios de PHP</title>
</head>
<body>
    <h1>Ejercicios de PHP</h1>

    <h2>1. Última palabra de una frase</h2>
    <?php
        $frase = "Esta es una frase de ejemplo";
        $palabras = explode(" ", $frase);
        $ultima_palabra = end($palabras);
        echo "La última palabra es: $ultima_palabra";
    ?>

    <h2>2. Usuario y dominio de un correo electrónico</h2>
    <?php 
        $email = "Usuario@Dominio.com";
        list($usuario, $dominio) = explode('@', strtolower($email));
        echo "Usuario: $usuario, Dominio: $dominio"; 
    ?>

    <h2>3. Comprobar si una cadena contiene vocales</h2>
    <?php 
        $cadena = "Ejemplo de cadena";
        if (preg_match('/[aeiouAEIOU]/', $cadena)) {
            echo "La cadena contiene al menos una vocal.";
        } else {
            echo "La cadena no contiene ninguna vocal.";
        }
    ?>

    <h2>4. Comparar cadenas: completa, 5 primeros caracteres y comparación natural</h2>
    <?php 
        $cadena1 = "Hola 9";
        $cadena2 = "Hola 10";
        
        // Comparación completa
        $resultado_completo = strcmp($cadena1, $cadena2);
        
        // Comparación de los 5 primeros caracteres
        $resultado_5_caracteres = strncmp($cadena1, $cadena2, 5);
        
        // Comparación natural
        $resultado_natural = strnatcmp($cadena1, $cadena2);
        
        echo "Comparación completa: $resultado_completo\n";
        echo "Comparación de 5 caracteres: $resultado_5_caracteres\n";
        echo "Comparación natural: $resultado_natural\n";
    ?>

    <h2>5. Sustituir vocales minúsculas por mayúsculas y viceversa</h2>
    <?php
        $cadena1 = "Hola 9";
        $cadena2 = "Hola 10";
        
        // Comparación completa
        $resultado_completo = strcmp($cadena1, $cadena2);
        
        // Comparación de los 5 primeros caracteres
        $resultado_5_caracteres = strncmp($cadena1, $cadena2, 5);
        
        // Comparación natural
        $resultado_natural = strnatcmp($cadena1, $cadena2);
        
        echo "Comparación completa: $resultado_completo\n";
        echo "Comparación de 5 caracteres: $resultado_5_caracteres\n";
        echo "Comparación natural: $resultado_natural\n";
    ?>

    <h2>6. Eliminar espacios y puntos antes y después del texto</h2>
    <?php
        $cadena = " ... Hola a todos ... ";
        $limpia = trim($cadena, ' .');
        echo $limpia;        
    ?>

    <h2>7. Rellenar una cadena con "#" hasta 20 caracteres (inicio, final, ambos)</h2>
    <?php
        $cadena = "Ejemplo";
        $cadena_rellenada_inicio = str_pad($cadena, 20, '#', STR_PAD_LEFT);
        $cadena_rellenada_final = str_pad($cadena, 20, '#', STR_PAD_RIGHT);
        $cadena_rellenada_ambos = str_pad($cadena, 20, '#', STR_PAD_BOTH);
        
        echo "Inicio: $cadena_rellenada_inicio\n";
        echo "Final: $cadena_rellenada_final\n";
        echo "Ambos: $cadena_rellenada_ambos\n";        
    ?>

    <h2>8. Escapar y desescapar caracteres problemáticos en una cadena</h2>
    <?php
        $cadena_original = "vamos al o'Brian";
        $cadena_escapada = addslashes($cadena_original);
        $cadena_desescapada = stripslashes($cadena_escapada);
        
        echo "Original: $cadena_original\n";
        echo "Escapada: $cadena_escapada\n";
        echo "Desescapada: $cadena_desescapada\n";        
    ?>

    <h2>9. Escapar y desescapar vocales (excepto "a") en una cadena</h2>
    <?php
        $cadena_original = "Esta es una cadena";
        $cadena_escapada = str_replace(['e', 'i', 'o', 'u'], ['\e', '\i', '\o', '\u'], $cadena_original);
        $cadena_desescapada = str_replace(['\e', '\i', '\o', '\u'], ['e', 'i', 'o', 'u'], $cadena_escapada);
        
        echo "Original: $cadena_original\n";
        echo "Escapada: $cadena_escapada\n";
        echo "Desescapada: $cadena_desescapada\n";        
    ?>
    <h2>10. Escapar caracteres que no sean letras ni espacios en una frase</h2>
    <?php
        $frase = "No me gusta usar +*[] en cadenas";
        $frase_escapada = preg_replace('/[^a-zA-Z\s]/', '', $frase);
        echo $frase_escapada;      
    ?>

    <h2>11. Convertir una cadena en un array de caracteres</h2>
    <?php
        $cadena = "Hola";
        $caracteres = str_split($cadena);
        print_r($caracteres);        
    ?>
    <h2>12. Comprobar si una cadena contiene una dirección IP válida</h2>
    <?php
        $cadena = "192.168.1.1";
        if (filter_var($cadena, FILTER_VALIDATE_IP)) {
            echo "La cadena contiene una dirección IP válida.";
        } else {
            echo "La cadena no contiene una dirección IP válida.";
        }
    ?>

</body>
</html>
