<?php
// xss.php

// 1. Recogemos el parámetro “name” vía POST sin validación ni escape
$name = isset($_POST['name']) ? $_POST['name'] : 'invitado';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Bienvenida</title>
    </head>
    <body>
        <h1>¡Hola, <?php echo $name; ?>!</h1>
        <p>Bienvenido a nuestro sitio.</p>
    </body>
</html>

