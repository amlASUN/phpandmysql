 <?php
include("conexion.php");

// 1. Recoger los datos del formulario
$nom = $_POST['nombre'];
$ape = $_POST['apellidos'];
$cor = $_POST['correo'];
$usu = $_POST['usuario'];
$pas = $_POST['password'];

// 2. Validar que no haya campos vacíos
if (empty($nom) || empty($ape) || empty($cor) || empty($usu) || empty($pas)) {
    die("Error: Todos los campos son obligatorios.");
}

// 3. Validar el formato del correo (@ y punto)
if (!filter_var($cor, FILTER_VALIDATE_EMAIL)) {
    die("Error: El formato del correo no es valido (debe contener @ y un punto).");
}

// 4. Validar seguridad del password (Fase 3)
$tiene_letra = preg_match('/[A-Za-z]/', $pas);
$tiene_numero = preg_match('/[0-9]/', $pas);
$tiene_simbolo = preg_match('/[^A-Za-z0-9]/', $pas);

if (strlen($pas) < 6 || !$tiene_letra || !$tiene_numero || !$tiene_simbolo) {
    die("Error: El password debe tener 6 caracteres, letra, numero y simbolo.");
}

// 5. Validar si el usuario ya existe (Corregido comillas)
$checkUsuario = "SELECT * FROM usuarios WHERE usuario = '$usu'";
$resCheck = mysqli_query($conexion, $checkUsuario);

if (mysqli_num_rows($resCheck) > 0) {
    die("Error: El usuario ya existe. Elige otro.");
}

// 6. Si todo ha ido bien, insertar los datos
$sql = "INSERT INTO usuarios (nombre, apellidos, correo, usuario, password) VALUES ('$nom', '$ape', '$cor', '$usu', '$pas')";

if (mysqli_query($conexion, $sql)) {
    echo "<h2 style='color: green;'>Usuario registrado con exito!</h2>";
    echo "<a href='login.php'>Ir al Login</a>";
} else {
    echo "Error: " . mysqli_error($conexion);
}
?>
