<?php
// index.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Demo SQL Injection</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        nav {
            background: #333;
            padding: 1em;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        nav li {
            margin-right: 1em;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 0.5em 1em;
            display: block;
        }
        nav a:hover {
            background: #444;
        }
        .container {
            padding: 2em;
        }
    </style>
</head>
<body>
<nav>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="sql-index.php">Demo SQL Injection</a></li>
        <li><a href="path-index.php">Path management</a></li>
        <li><a href="xss-index.php">XSS</a></li>
        <!-- Puedes añadir más enlaces aquí -->
    </ul>
</nav>

<div class="container">
    <h1>Página de Inicio</h1>
    <p>Bienvenido a la demo de SQL Injection. Usa el menú de navegación para ir a la demostración.</p>
</div>
</body>
</html>

