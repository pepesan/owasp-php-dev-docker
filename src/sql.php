<?php
// simulamos la recepción de datos (método GET)
$username = isset($_GET['username']) ? $_GET['username'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';

// construimos la consulta concatenando directamente las variables
$sql = "SELECT * FROM users "
    . "WHERE username = '$username' "
    . "AND password = '$password'";

// en lugar de ejecutar, imprimimos la consulta
header('Content-Type: text/plain; charset=utf-8');
echo "Consulta SQL generada:\n";
echo $sql;

