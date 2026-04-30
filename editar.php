<?php
session_start();
require_once 'conexion.php';
require_once 'funciones.php';
comprobarSesion();

$id = $_GET['id'];
$p = obtenerPeliculaPorId($conn, $id);
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "UPDATE peliculas SET titulo='{$_POST['titulo']}', saga='{$_POST['saga']}', anyo='{$_POST['anyo']}', descripcion='{$_POST['descripcion']}', puntuacion='{$_POST['puntuacion']}' WHERE id_pelicula=$id";
    if ($conn->query($sql)) {
        $mensaje = "Película actualizada.";
        $p = obtenerPeliculaPorId($conn, $id);
    } else {
        $mensaje = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar película</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <h1>Editar película</h1>
    <a href="listar.php">Volver</a>
    <hr>

    <?php if ($mensaje != "")
        echo "<p>$mensaje</p>"; ?>

    <form method="POST">
        Título: <input type="text" name="titulo" value="<?php echo $p['titulo']; ?>" required><br><br>
        Saga: <input type="text" name="saga" value="<?php echo $p['saga']; ?>" required><br><br>
        Año: <input type="number" name="anyo" value="<?php echo $p['anyo']; ?>" required><br><br>
        Descripción: <textarea name="descripcion"><?php echo $p['descripcion']; ?></textarea><br><br>
        Puntuación: <input type="number" name="puntuacion" step="0.1" min="0" max="10"
            value="<?php echo $p['puntuacion']; ?>"><br><br>
        <input type="submit" value="Guardar cambios">
    </form>
</body>

</html>