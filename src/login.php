<?php

require 'config.php';

// Comprobación CSRF
if (
    !isset($_POST['csrf_token']) ||
    !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
) {
    http_response_code(400);
    die('Solicitud inválida (CSRF).');
}

// Array con usuarios permitidos (usuario => contraseña)
// En un entorno real, usarías una base de datos y password_hash()/password_verify()
$users = [
    'admin' => 'admin',
    'usuario' => 'claveSegura'
];

// Recogemos y saneamos los datos del POST
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (isset($users[$username]) && $password === $users[$username]) {
    // Credenciales válidas
    // Opcional: regenera sesión para evitar fijación
    session_regenerate_id(true);
    $_SESSION['user'] = $username;
    // También regenera el CSRF token
    $_SESSION['csrf_token'] = bin2hex(secure_random_bytes(32));
    header('Location: dashboard.php');
    exit;
} else {
    $_SESSION['error'] = 'Usuario o contraseña incorrectos.';
    header('Location: login-index.php');
    exit;
}
