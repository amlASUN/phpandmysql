<?php
include("conexion.php");

$usuario = $_POST['usuario'];
$password = $_POST['password'];

if (empty($usuario) || empty($password)) {
    die("Error: Todos los campos son obligatorios.");
}

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) == 1) {
    echo "<h2 style='color: green;'>Bienvenido $usuario</h2>";
    echo "<a href='index.php'>Cerrar sesión</a>";
} else {
    echo "<h2 style='color: red;'>Error: Usuario o password incorrecto.</h2>";
    echo "<a href='login.php'>Intentar de nuevo</a>";
}
?>
