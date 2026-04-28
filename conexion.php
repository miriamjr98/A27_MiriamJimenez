<?php
// Configuración de los parámetros de conexión a la base de datos MySQL.
$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "cine";

$conn = new mysqli($servidor, $usuario, $password, $basedatos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>