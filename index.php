<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .container{
            max-width: 500px;
            margin: 80px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1{
            margin-bottom: 10px;
        }
        p{
            margin: 10px 0 20px;
        }
        a.btn{
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background: #007bff;
            border-radius: 4px;
        }
        a.btn-secondary{
            background: #6c757d;
        }
        .username{
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Bienvenido a la web</h1>
    <p>Ejemplo de sistema con Registro y Login usando PHP y MySQL.</p>

    <?php if (isset($_SESSION['user_id'])): ?>
        <p>Has iniciado sesión como
            <span class="username">
                <?= htmlspecialchars($_SESSION['user_nombre'] ?? 'Usuario') ?>
            </span>
        </p>
        <a class="btn" href="dashboard.php">Ir al panel</a>
        <a class="btn btn-secondary" href="logout.php">Cerrar sesión</a>
    <?php else: ?>
        <p>Para continuar, inicia sesión o regístrate.</p>
        <a class="btn" href="login.php">Iniciar sesión</a>
        <a class="btn btn-secondary" href="registro.php">Registrarse</a>
    <?php endif; ?>
</div>
</body>
</html>
