<?php
$db_host = "localhost";
$db_usuario = "tienda";
$db_contrasena = "tienda";
$db_nombre = "tienda_lena";

try {
    // Crear una instancia de conexión PDO
    $conexion = new PDO("mysql:host=$db_host;dbname=$db_nombre", $db_usuario, $db_contrasena);
    // Establecer el modo de error de PDO a excepción
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En caso de error en la conexión, mostrar mensaje y detener el script
    die("Error de conexión: " . $e->getMessage());
}
?>
