<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];
$loginTime = $_SESSION['login_time'] ?? 'No disponible';
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel privado</title>
    <style>
        body {
            font-family: Tahoma, sans-serif;
            background: #eef2f6;
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
        }
        .panel {
            background: white;
            padding: 24px;
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            max-width: 500px;
            width: calc(100% - 32px);
        }
        a {
            display: inline-block;
            margin-top: 16px;
            color: #0e7490;
            font-weight: 700;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <section class="panel">
        <h1>Bienvenido, <?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?></h1>
        <p>Esta es un area protegida por sesion.</p>
        <p>Inicio de sesion: <?php echo htmlspecialchars($loginTime, ENT_QUOTES, 'UTF-8'); ?></p>
        <a href="logout.php">Cerrar sesion</a>
    </section>
</body>
</html>
