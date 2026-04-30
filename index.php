<?php
session_start();
require_once 'funciones.php';
comprobarSesion();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <h1>Bienvenido
        <?php echo $_SESSION['usuario']; ?>
    </h1>
    <a href="listar.php">Ver películas</a> |
    <a href="insertar.php">Añadir película</a> |
    <a href="logout.php">Cerrar sesión</a>
</body>

</html>