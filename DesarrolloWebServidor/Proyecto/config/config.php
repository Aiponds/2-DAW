<?php
define('USER', 'dwes');
define('PASSWORD', 'abc123.');
define('HOST', 'localhost');
define('DATABASE', 'tienda_lena');

// Función para cambiar el tema
function cambiarTema()
{
    if ($_COOKIE["tema"] == "light") {
        setcookie("tema", "dark", time() + (86400 * 30), "/"); // 86400 segundos = 1 día
        $_COOKIE["tema"] = "dark";
    } else {
        setcookie("tema", "light", time() + (86400 * 30), "/"); // 86400 segundos = 1 día
        $_COOKIE["tema"] = "light";
    }
}

try {
    $connection = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE, USER, PASSWORD);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>
