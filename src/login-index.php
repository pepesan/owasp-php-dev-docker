<?php
// 1. Incluye config.php (session_start + generación de csrf_token si no existe)
require_once __DIR__ . '/config.php';

// 2. Opcional: por seguridad, asegúrate de que esté el token
if (!isset($_SESSION['csrf_token'])) {
    // Si config.php es correcto esto no debería saltar, pero por si acaso:
    $_SESSION['csrf_token'] = bin2hex(secure_random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h2>Formulario de Login</h2>

<?php
// Si existe un mensaje de error, lo mostramos y luego lo borramos
if (isset($_SESSION['error'])) {
    echo '<p style="color:red;">' . htmlspecialchars($_SESSION['error']) . '</p>';
    unset($_SESSION['error']);
}
?>

<form action="login.php" method="post">
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
    <label for="username">Usuario:</label><br>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Contraseña:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">Entrar</button>
</form>

<?php
// Incluye el fichero y sigue aunque falle (genera un _warning_)
include 'session.php';
?>
</body>
</html>
