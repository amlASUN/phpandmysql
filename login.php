<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>

    <form action="procesar_login.php" method="POST">
        Usuario: <input type="text" name="usuario"><br><br>
        Password: <input type="password" name="password"><br><br>

        <input type="submit" value="Entrar">
    </form>

    <br>
    <a href="index.php">Volver al inicio</a>
</body>
</html>
