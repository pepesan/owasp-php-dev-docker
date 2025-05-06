<?php
// xss-sanitized.php
header('Content-Type: text/html; charset=utf-8');

// Recogemos sin validación extra; usaremos escape a la salida
$name = $_POST['name'] ?? 'invitado';

$name_raw = $_POST['name'] ?? '';

// 2. Definimos patrón: solo letras (incluye acentos y caracteres unicode) y espacios, 1–50 chars
$pattern = '/^[\p{L} ]{1,50}$/u';

// 3. Validamos; si no cumple, usamos valor por defecto
if (preg_match($pattern, $name_raw)) {
    $name_ret = $name_raw;
} else {
    $name_ret = 'invitado';
}
// 4. Escapamos para salida en HTML
$name_escaped = htmlspecialchars($name_ret, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Bienvenida</title>
    </head>
    <body>
        <h1>¡Hola, <?php
            // Escapamos siempre antes de imprimir en HTML
            echo htmlspecialchars($name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
            ?>!</h1>
        <p>Bienvenido a nuestro sitio.</p>
        <h1>Contenido escapado</h1>
        <h2>¡Hola, <?= $name_escaped ?>!</h2>
    </body>
</html>
