<!-- Mostrar todo el contenido de la sesión -->
<h3>Contenido de la sesión</h3>
<table>
    <thead>
    <tr>
        <th>Clave</th>
        <th>Valor</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($_SESSION as $key => $value): ?>
        <tr>
            <td><?= htmlspecialchars($key, ENT_QUOTES, 'UTF-8'); ?></td>
            <td>
                <?php
                if (is_array($value) || is_object($value)) {
                    echo '<pre>' . htmlspecialchars(print_r($value, true), ENT_QUOTES, 'UTF-8') . '</pre>';
                } else {
                    echo htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
                }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
