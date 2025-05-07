<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = __DIR__ . '/uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // No se valida extensión, tipo MIME ni tamaño
    $filename = basename($_FILES['file']['name']);
    $targetFile = $uploadDir . $filename;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        echo "Fichero subido correctamente: <a href='uploads/{$filename}'>Ver fichero</a>";
    } else {
        echo "Error al subir el fichero.";
    }
} else {
    echo "Solicitud no válida.";
}
