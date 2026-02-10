<?php
require_once 'conexion.php';
require_once 'validaciones.php';
$error = ''; $exito = '';

if ($_POST) {
    $nombre = $_POST['nombre'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $email = $_POST['email'] ?? '';
    $usuario = $_POST['usuario'] ?? '';
    $pass = $_POST['password'] ?? '';

    if (!campos_llenos([$nombre, $apellidos, $email, $usuario, $pass])) {
        $error = 'Todos los campos son obligatorios.';
    } elseif (!validar_email($email)) {
        $error = 'El email debe contener @ y un punto.';
    } elseif (!validar_password($pass)) {
        $error = 'Password: mínimo 6 caracteres, con letra, número y símbolo.';
    } else {
        // Verificar usuario duplicado
        $check_usuario = $conn->prepare("SELECT id FROM usuarios WHERE usuario = ? OR email = ?");
        $check_usuario->bind_param("ss", $usuario, $email);
        $check_usuario->execute();
        if ($check_usuario->get_result()->num_rows > 0) {
            $error = 'Usuario o email ya existe.';
        } else {
            $hash = password_hash($pass, PASSWORD_DEFAULT);  // Hash seguro[web:26][web:28][page:0]
            $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellidos, email, usuario, password) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $nombre, $apellidos, $email, $usuario, $hash);
            if ($stmt->execute()) {
                $exito = 'Usuario registrado. Ve al login.';
            } else {
                $error = 'Error al registrar: ' . $conn->error;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head><title>Registro</title></head>
<body>
<h2>Registro de Usuario</h2>
<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
<?php if ($exito) echo "<p style='color:green;'>$exito</p>"; ?>
<form method="POST">
    Nombre: <input type="text" name="nombre" required><br>
    Apellidos: <input type="text" name="apellidos" required><br>
    Email: <input type="email" name="email" required><br>
    Usuario: <input type="text" name="usuario" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Registrar</button>
</form>
<a href="login.php">¿Ya tienes cuenta? Login</a>
</body>
</html>
