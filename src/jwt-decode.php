<?php
require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secretKey = 'mi_clave_ultra_secreta';

// 1) Obtén el token del encabezado (o de donde lo envíes)
$authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
if (!preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
    http_response_code(401);
    echo 'Token no proporcionado';
    exit;
}
$token = $matches[1];

try {
    // 2) Decodifica y verifica firma + algoritmos + expiración
    $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));

    // 3) $decoded es un objeto con tus claims
    //    Ejemplo: acceder a UID y roles
    $userId = $decoded->uid;
    $roles  = $decoded->roles;

    // 4) Comprueba manualmente otros claims si lo necesitas
    //    (aud, iss, etc.) — aunque la librería ya lanza excepción
    if ($decoded->iss !== 'https://tu-dominio.com') {
        throw new Exception('Issuer inválido');
    }

    // Si todo va bien, continúa con la lógica de tu app
    echo "Usuario autenticado: $userId :: ";
    echo "Roles Asignados :: ";
    echo json_encode([
        'roles_asignados' => $roles
    ], JSON_PRETTY_PRINT);
    echo "Payload :: ";
    echo json_encode([
        'payload_completo' => $decoded
    ], JSON_PRETTY_PRINT);

} catch (\Firebase\JWT\ExpiredException $e) {
    http_response_code(401);
    echo 'Token expirado';
} catch (\Firebase\JWT\SignatureInvalidException $e) {
    http_response_code(401);
    echo 'Firma inválida';
} catch (\Exception $e) {
    http_response_code(400);
    echo 'Token no válido: ' . $e->getMessage();
}
