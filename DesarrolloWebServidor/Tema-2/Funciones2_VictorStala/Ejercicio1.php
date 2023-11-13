<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <?php
    function intercambio(&$num1, &$num2)
    {
        $temp = $num1;
        $num1 = $num2;
        $num2 = $temp;
    }

    $a = 3;
    $b = 7;
    intercambio($a, $b);

    echo "\$a después del intercambio: $a<br>";
    echo "\$b después del intercambio: $b";
    ?>

</body>

</html>