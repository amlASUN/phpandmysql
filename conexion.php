<?php
$server = "localhost";
$username = "root";  // Cambia por tu usuario MySQL
$password = "";      // Cambia por tu contraseña MySQL
$db = "usuarios_db";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
