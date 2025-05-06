<?php
// sql-sanitized.php (solo muestra la query sanitizada)
header('Content-Type: text/plain; charset=utf-8');

// Recogemos usuario y contraseña (método GET)
$username = isset($_GET['username']) ? $_GET['username'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';

// Escapamos manualmente para evitar inyección
$username_sanitized = htmlspecialchars($username, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$password_sanitized = htmlspecialchars($password, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

// Construimos la query con los valores ya escapados
$sql = "SELECT * FROM users "
    . "WHERE username = '{$username_sanitized}' "
    . "AND password = '{$password_sanitized}'";

// Mostramos la consulta sanitizada
echo "Consulta SQL sanitizada:\n";
echo $sql;
