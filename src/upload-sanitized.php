<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = __DIR__ . '/uploads/';
    $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
    $maxFileSize = 2 * 1024 * 1024; // 2MB

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $file = $_FILES['file'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    // 1. Comprobar extensión
    if (!in_array($ext, $allowedExt)) {
        die('Tipo de fichero no permitido.');
    }

    // 2. Comprobar tamaño
    if ($file['size'] > $maxFileSize) {
        die('Fichero demasiado grande.');
    }

    // 3. Verificar MIME real
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);
    $allowedMime = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($mime, $allowedMime)) {
        die('Tipo MIME no válido.');
    }

    // 4. Generar nombre único y mover
    $newName = uniqid('img_', true) . "." . $ext;
    $targetFile = $uploadDir . $newName;

    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        // 5. Forzar permisos no ejecutables
        chmod($targetFile, 0644);
        echo 'Fichero subido correctamente.';
    } else {
        echo 'Error al subir el fichero.';
    }
} else {
    echo 'Solicitud no válida.';
}