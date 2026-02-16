<?php
include("conexion.php");

$nom = $_POST['nombre'];
$ape = $_POST['apellidos'];
$cor = $_POST['correo'];
$usu = $_POST['usuario'];
$pas = $_POST['password'];

if (empty($nom) || empty($ape) || empty($cor) || empty($usu) || empty($pas)) {
    die("Error: Todos los campos son obligatorios.");
}

if (!filter_var($cor, FILTER_VALIDATE_EMAIL)) {
    die("Error: El formato del correo no es válido.");
}

$tiene_letra = preg_match('/[A-Za-z]/', $pas);
$tiene_numero = preg_match('/[0-9]/', $pas);
$tiene_simbolo = preg_match('/[^A-Za-z0-9]/', $pas);

if (strlen($pas) < 6 || !$tiene_letra || !$tiene_numero || !$tiene_simbolo) {
    die("Error: El password debe tener mínimo 6 caracteres, una letra, un número y un símbolo.");
}

$checkUsuario = "SELECT * FROM usuarios WHERE usuario = '$usu'";
$resCheck = mysqli_query($conexion, $checkUsuario);

if (mysqli_num_rows($resCheck) > 0) {
    die("Error: El usuario ya existe.");
}

$sql = "INSERT INTO usuarios (nombre, apellidos, correo, usuario, password)
        VALUES ('$nom', '$ape', '$cor', '$usu', '$pas')";

if (mysqli_query($conexion, $sql)) {
    echo "<h2 style='color: green;'>Usuario registrado con éxito!</h2>";
    echo "<a href='login.php'>Ir al Login</a>";
} else {
    echo "Error: " . mysqli_error($conexion);
}
?>
