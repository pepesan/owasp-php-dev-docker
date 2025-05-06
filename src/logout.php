<?php
// logout.php
session_start();

// Destruye todas las variables de sesión
$_SESSION = [];

// Si se quiere borrar también la cookie de sesión (opcional)
/*
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
*/

// Finalmente, destruye la sesión
session_destroy();

// Redirige de nuevo al formulario de login
header('Location: login-index.php');
exit;
