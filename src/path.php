<?php
// path.php

// Recuperamos directamente los parámetros sin ninguna validación:
$path = isset($_POST['path']) ? $_POST['path'] : '';
$file = isset($_POST['file']) ? $_POST['file'] : '';

// Concatenamos para formar la ruta completa:
$fullPath = $path . DIRECTORY_SEPARATOR . $file;

// Intentamos leer el contenido (aquí se ve la vulnerabilidad):
if (file_exists($fullPath)) {
    // Para evitar que el navegador ejecute HTML/JS que venga en el fichero,
    // escapamos el contenido antes de mostrarlo.
    $content = file_get_contents($fullPath);
    echo '<h2>Contenido de ' . htmlspecialchars($fullPath) . ':</h2>';
    echo '<pre>' . htmlspecialchars($content) . '</pre>';
} else {
    echo '<p style="color:red;">No existe el fichero: ' . htmlspecialchars($fullPath) . '</p>';
}
