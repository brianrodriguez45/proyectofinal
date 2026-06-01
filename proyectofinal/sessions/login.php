<?php
session_start();

if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit;
}

$error = '';

function loadCredentials(string $filePath): array
{
    if (!is_readable($filePath)) {
        return [];
    }

    $credentials = [];
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $line = trim($line);

        if ($line === '' || strpos($line, '#') === 0) {
            continue;
        }

        $parts = explode(':', $line, 2);
        if (count($parts) !== 2) {
            continue;
        }

        $username = trim($parts[0]);
        $passwordHash = trim($parts[1]);

        if ($username !== '' && $passwordHash !== '') {
            $credentials[$username] = $passwordHash;
        }
    }

    return $credentials;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $credentials = loadCredentials(__DIR__ . '/pass.txt');

    // php -r "echo password_hash('password', PASSWORD_DEFAULT), PHP_EOL;
    if (isset($credentials[$username]) && password_verify($password, $credentials[$username])) {
        session_regenerate_id(true);
        $_SESSION['username'] = $username;
        $_SESSION['login_time'] = date('Y-m-d H:i:s');

        header('Location: dashboard.php');
        exit;
    }

    $error = 'Usuario o contrasena incorrectos.';
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login con sesion</title>
    <style>
        body {
            font-family: Tahoma, sans-serif;
            background: #f4f6f8;
            margin: 0;
            display: grid;
            place-items: center;
            min-height: 100vh;
        }
        .card {
            background: #fff;
            padding: 24px;
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 360px;
        }
        h1 {
            margin-top: 0;
            font-size: 1.4rem;
        }
        label {
            display: block;
            margin: 12px 0 6px;
            font-weight: 600;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccd3db;
            border-radius: 8px;
            box-sizing: border-box;
        }
        button {
            margin-top: 16px;
            width: 100%;
            padding: 10px;
            border: 0;
            border-radius: 8px;
            background: #0e7490;
            color: #fff;
            font-weight: 700;
            cursor: pointer;
        }
        .error {
            margin-top: 12px;
            color: #b42318;
            font-size: 0.95rem;
        }
        .help {
            margin-top: 12px;
            font-size: 0.9rem;
            color: #475467;
        }
    </style>
</head>
<body>
    <main class="card">
        <h1>Iniciar sesion</h1>
        <form method="post" action="login.php" autocomplete="off">
            <label for="username">Usuario</label>
            <input id="username" name="username" type="text" required>

            <label for="password">Contrasena</label>
            <input id="password" name="password" type="password" required>

            <button type="submit">Entrar</button>
        </form>

        <?php if ($error !== ''): ?>
            <p class="error"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>

        <p class="help">Credenciales de ejemplo: daniel / password</p>
    </main>
</body>
</html>
