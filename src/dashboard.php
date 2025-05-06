<?php
session_start();

// Si llega la acción de logout, destruye la sesión y vuelve al login
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_unset();
    session_destroy();
    header('Location: login-index.php');
    exit;
}

// Si no hay usuario en sesión, redirige al login
if (!isset($_SESSION['user'])) {
    header('Location: login-index.php');
    exit;
}

// Usuario autenticado
$username = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
<h2>Bienvenido, <?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>!</h2>
<p>Has accedido correctamente al área privada.</p>

<!-- Enlace para cerrar sesión -->
<p><a href="logout.php">Cerrar sesión</a></p>
<?php
// Incluye el fichero y sigue aunque falle (genera un _warning_)
include 'session.php';
?>
</body>
</html>
