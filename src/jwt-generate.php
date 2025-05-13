<?php

require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// 1) Define tu clave secreta (debe guardarse de forma segura, fuera del código)
$secretKey = 'mi_clave_ultra_secreta';

// 2) Crea el payload con las declaraciones (claims)
$payload = [
    'iss' => 'https://tu-dominio.com',        // Emisor
    'aud' => 'https://tu-app.com',            // Audiencia
    'iat' => time(),                          // Emitido en (timestamp)
    'nbf' => time(),                          // No antes de…
    'exp' => time() + 3600,                   // Expiración (1 hora)
    'uid' => 123,                             // Datos de usuario, por ej. ID
    'roles' => ['admin', 'editor'],            // Cualquier otro dato
];

// 3) Firma el token con HS256
$jwt = JWT::encode($payload, $secretKey, 'HS256');

// 4) Envías $jwt al cliente (cabecera HTTP, cookie, respuesta JSON…)
echo $jwt;
