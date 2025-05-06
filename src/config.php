<?php
// config.php (inclúyelo con require en todos tus ficheros)
session_set_cookie_params([
    'lifetime' => 0,
    'path'     => '/',
    'domain'   => '',        // tu dominio
    'secure'   => true,      // exigir HTTPS
    'httponly' => true,      // JS no puede leer la cookie
    'samesite' => 'Strict'   // bloquea peticiones cross-site
]);
session_start();

// Generador seguro de bytes aleatorios (fallback si no existe random_bytes)
function secure_random_bytes(int $length): string {
    if (function_exists('random_bytes')) {
        return random_bytes($length);
    }
    if (function_exists('openssl_random_pseudo_bytes')) {
        $strong = false;
        $bytes = openssl_random_pseudo_bytes($length, $strong);
        if ($bytes !== false && $strong) {
            return $bytes;
        }
    }
    throw new Exception('No hay un generador de números aleatorios seguro disponible.');
}

// Si no existe el CSRF token, lo generamos
if (!isset($_SESSION['csrf_token'])) {
    // 32 bytes → 64 hex chars
    $_SESSION['csrf_token'] = bin2hex(secure_random_bytes(32));
}
