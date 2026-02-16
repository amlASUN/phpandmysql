<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "login_web";

$conexion = mysqli_connect($host, $user, $pass, $db);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
