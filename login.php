<?php
session_start();
require_once 'conexion.php';

$error = '';
if ($_POST) {
    $usuario = $_POST['usuario'] ?? '';
    $pass = $_POST['password'] ?? '';

    if (empty($usuario) || empty($pass)) {
        $error = 'Usuario y password obligatorios.';
    } else {
        $stmt = $conn->prepare("SELECT password FROM usuarios WHERE usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            if (password_verify($pass, $row['password'])) {  // Verifica hash[web:26]
                $_SESSION['usuario'] = $usuario;
                header("Location: dashboard.php");  // Página protegida
                exit;
            } else {
                $error = 'Usuario o password incorrecto.';
            }
        } else {
            $error = 'Usuario o password incorrecto.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head><title>Login</title></head>
<body>
<h2>Login</h2>
<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST">
    Usuario: <input type="text" name="usuario" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Entrar</button>
</form>
<a href="registro.php">¿No tienes cuenta? Regístrate</a>
</body>
</html>
