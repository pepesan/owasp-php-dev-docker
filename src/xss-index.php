<?php
// formulario.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Bienvenida</title>
</head>
<body>
<h1>Escríbenos tu nombre</h1>
<form method="post" action="xss.php">
    <label for="name">Nombre:</label>
    <input name="name" value="<script>alert('XSS via POST')</script>">
    <button type="submit">Enviar</button>
</form>

<h2>Formulario para código sanitizado</h2>
<form method="post" action="xss-sanitized.php">
    <label for="name">Nombre:</label>
    <!-- Pre–rellenamos con el mismo payload malicioso -->
    <input
        type="text"
        id="name"
        name="name"
        value="<script>alert('XSS via POST')</script>"
    >
    <button type="submit">Enviar</button>
</form>
</body>
</html>

