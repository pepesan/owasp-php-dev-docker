<?php
// path.php (versión segura)

// 1) Definimos un directorio base inmutable
define('BASE_DIR', realpath(__DIR__ . '/files-seguro'));
if (BASE_DIR === false) {
    die('Configuración de servidor incorrecta.');
}

// 2) Recuperamos parámetros
$path = $_POST['path']   ?? '';
$file = $_POST['file']   ?? '';

// 3) Validamos que no vengan secuencias “../” ni barras al inicio
if (strpos($path, '..') !== false || strpos($path, '/') === 0 || strpos($path, '\\') === 0) {
    die('Ruta inválida.');
}

// 4) Construimos la ruta del subdirectorio y comprobamos con realpath
$requestedDir = realpath(BASE_DIR . DIRECTORY_SEPARATOR . $path);
if ($requestedDir === false || strpos($requestedDir, BASE_DIR) !== 0) {
    die('Acceso no autorizado al directorio.');
}

// 5) Validamos nombre de fichero (sólo nombre, sin rutas)
if (basename($file) !== $file) {
    die('Nombre de fichero inválido.');
}

// 6) Construimos la ruta completa del fichero y re-resolvemos
$fullPath = $requestedDir . DIRECTORY_SEPARATOR . $file;
$realFile = realpath($fullPath);
if ($realFile === false || strpos($realFile, $requestedDir) !== 0) {
    die('Acceso no autorizado al fichero.');
}

// 7) Leemos y mostramos de forma segura
if (!is_file($realFile) || !is_readable($realFile)) {
    die('Fichero no existe o no es legible.');
}

$content = file_get_contents($realFile);
echo '<h2>Contenido de ' . htmlspecialchars($file, ENT_QUOTES, 'UTF-8') . ':</h2>';
echo '<pre>' . htmlspecialchars($content, ENT_QUOTES, 'UTF-8') . '</pre>';
