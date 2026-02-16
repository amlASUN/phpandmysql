<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h2>Registro de Usuario</h2>

    <form action="procesar_registro.php" method="POST">
        Nombre: <input type="text" name="nombre"><br><br>
        Apellidos: <input type="text" name="apellidos"><br><br>
        Correo: <input type="text" name="correo"><br><br>
        Usuario: <input type="text" name="usuario"><br><br>
        Password: <input type="password" name="password"><br><br>

        <input type="submit" value="Registrarse">
    </form>

    <br>
    <a href="index.php">Volver al inicio</a>
</body>
</html>
