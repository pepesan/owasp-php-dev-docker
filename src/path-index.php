<!-- path-index.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Demostración Path Traversal</title>
</head>
<body>
<h1>Form para lectura de ficheros vía POST</h1>
<form method="post" action="path.php">
    <label for="path">Ruta (path):</label>
    <input type="text" id="path" name="path" placeholder="e.g. ../../etc" required>
    <br><br>
    <label for="file">Nombre de fichero:</label>
    <input type="text" id="file" name="file" placeholder="e.g. passwd" required>
    <br><br>
    <button type="submit">Enviar</button>
</form>
<h3>
    mete primero el path . y el nombre de fichero fichero.txt
</h3>
<h3>
    mete después el path files y el nombre de fichero fichero.txt
</h3>

<h2>Método más seguro</h2>
<form method="post" action="path-sanitized.php">
    <label for="path">Ruta (path):</label>
    <input type="text" id="path" name="path" placeholder="e.g. ../../etc" required>
    <br><br>
    <label for="file">Nombre de fichero:</label>
    <input type="text" id="file" name="file" placeholder="e.g. passwd" required>
    <br><br>
    <button type="submit">Enviar</button>
</form>
<h3>
    mete primero el path . y el nombre de fichero fichero.txt
</h3>
<h3>
    mete después el path ../files y el nombre de fichero fichero.txt
</h3>
</body>
</html>
