<?php
define('USER', 'dwes');
define('PASSWORD', 'abc123.');
define('HOST', 'localhost');
define('DATABASE', 'tienda_lena');

function setTemaCookie($tema) {
    setcookie('tema_preferido', $tema, time() + (365 * 24 * 60 * 60), '/');
}

function getTemaCookie() {
    return isset($_COOKIE['tema_preferido']) ? $_COOKIE['tema_preferido'] : 'light';
}

try {
    $connection = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE, USER, PASSWORD);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>
