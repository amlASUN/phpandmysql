<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html><head><title>Dashboard</title></head>
<body>
<h2>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h2>
<a href="logout.php">Salir</a>
</body>
</html>
