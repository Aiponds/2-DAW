<?php
define('USER', 'dwes');
define('PASSWORD', 'abc123.');
define('HOST', 'localhost');
define('DATABASE', 'tienda_lena');
try {
    $connection = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE, USER, PASSWORD);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>