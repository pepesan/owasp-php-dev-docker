<?php
// sql-index.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Demo SQL Injection</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2em; }
        label { display: block; margin: 0.5em 0; }
        input { padding: 0.5em; width: 200px; }
        button { padding: 0.5em 1em; margin-top: 1em; }
        .attack-example { background: #f8d7da; color: #721c24; padding: 1em; border-radius: 4px; margin-top: 2em; }
        code { background: #eee; padding: 0.2em 0.4em; border-radius: 3px; }
    </style>
</head>
<body>
<h1>Demo de SQL Injection</h1>
<p>Introduce usuario y contraseña para ver la consulta SQL generada por <code>sql.php</code>:</p>

<form action="sql.php" method="get">
    <label>
        Usuario:
        <input type="text" name="username" placeholder="admin">
    </label>
    <label>
        Contraseña:
        <input type="text" name="password" placeholder="password123">
    </label>
    <button type="submit">Enviar</button>
</form>

<div class="attack-example">
    <h2>Ejemplo de ataque destructivo</h2>
    <p>Este payload intenta eliminar la tabla <code>users</code>:</p>
    <p>
        <code>admin'; DROP TABLE users; --</code>
    </p>
    <p>
        La consulta resultante impresa por <code>sql.php</code> sería algo así:
    </p>
    <pre>
Consulta SQL generada:
SELECT * FROM usuarios WHERE username = 'admin' AND password = 'admin'; DROP TABLE users; --
    </pre>
    <p>
        - El punto y coma <code>;</code> termina la primera sentencia.<br>
        - <code>DROP TABLE users;</code> elimina la tabla.<br>
        - <code>--</code> comenta el resto, evitando errores de sintaxis.
    </p>
    <p><strong>¡Peligroso!</strong> Con este simple payload, un atacante podría borrar datos críticos si no se usan consultas preparadas.</p>
</div>
<h1>Demo de SQL Injection (Seguro)</h1>
<p>Introduce usuario y contraseña para ver la consulta segura generada por <code>sql-sanitized.php</code>:</p>

<form action="sql-sanitized.php" method="get">
    <label>
        Usuario:
        <input type="text" name="username" placeholder="admin">
    </label>
    <label>
        Contraseña:
        <input type="text" name="password" placeholder="password123">
    </label>
    <button type="submit">Enviar</button>
</form>

<div class="attack-example">
    <h2>Intento de ataque</h2>
    <p>Puedes probar el mismo payload malicioso:</p>
    <p><code>admin'; DROP TABLE users; --</code></p>
    <p>Verás que, al usar sentencias preparadas, ese texto se trata como dato y NO rompe la consulta.</p>
</div>
</body>
</html>
