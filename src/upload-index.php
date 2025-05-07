<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subida de archivos insegura</title>
</head>
<body>
<h1>Subir archivo (inseguro)</h1>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="file">Selecciona un fichero:</label>
    <input type="file" name="file" id="file">
    <button type="submit">Subir</button>
</form>
<h1>Subir archivo (seguro)</h1>
<form action="upload-sanitized.php" method="post" enctype="multipart/form-data">
    <label for="file">Selecciona un fichero:</label>
    <input type="file" name="file" id="file">
    <button type="submit">Subir</button>
</form>
</body>
</html>
