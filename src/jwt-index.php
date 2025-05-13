<?php
// index-jwt.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Demo JWT</title>
</head>
<body>
<h1>Demostración de JWT</h1>

<!-- 1) Enlace al generador de JWT -->
<p>
    <a href="jwt-generate.php" target="_blank">
        Crear y ver JWT
    </a>
</p>

<!-- 2) Botón para enviar el token a decode-jwt.php -->
<p>
    <button id="btn-decode">
        Enviar JWT a jwt-decode.php
    </button>
</p>

<!-- Aquí mostraremos el token y la respuesta -->
<div id="output" style="background:#f0f0f0; padding:1em;"></div>

<script>
    document.getElementById('btn-decode').addEventListener('click', async () => {
        const out = document.getElementById('output');
        out.textContent = 'Obteniendo token…';

        // Paso 1: fetch a create-jwt.php para obtener el token
        let token;
        try {
            token = await fetch('jwt-generate.php').then(res => {
                if (!res.ok) throw new Error('Error al generar el JWT');
                return res.text();
            });
        } catch (err) {
            out.textContent = err.message;
            return;
        }

        out.textContent = 'Token obtenido:\n' + token + '\n\nEnviando a jwt-decode.php…';

        // Paso 2: POST al endpoint de decodificación
        let decoded;
        try {
            const res = await fetch('jwt-decode.php', {
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + token.trim()
                }
            });
            if (!res.ok) throw new Error('decode-jwt.php respondió con ' + res.status);
            decoded = await res.text();
        } catch (err) {
            out.textContent += '\n\nError en la decodificación:\n' + err.message;
            return;
        }

        // Mostrar la respuesta de decode-jwt.php
        out.textContent += '\n\nRespuesta decode-jwt.php:\n' + decoded;
    });
</script>
</body>
</html>
