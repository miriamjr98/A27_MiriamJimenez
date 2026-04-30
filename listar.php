<?php
session_start();
require_once 'conexion.php';
require_once 'funciones.php';
comprobarSesion();

// Muestra la tabla de películas y gestiona el filtrado por saga y la eliminación.

if (isset($_GET['eliminar']))
    eliminarPelicula($conn, $_GET['eliminar']);

$peliculas = (isset($_POST['saga']) && $_POST['saga'] != "")
    ? obtenerPeliculasPorSaga($conn, $_POST['saga'])
    : obtenerPeliculas($conn);

$sagas = obtenerSagas($conn);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Películas</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <h1>Películas</h1>
    <a href="index.php">Volver</a>
    <hr>

    <form method="POST">
        <select name="saga">
            <option value="">Todas</option>
            <?php while ($f = $sagas->fetch_assoc()) { ?>
                    <option value="<?php echo $f['saga']; ?>">
                        <?php echo $f['saga']; ?>
                    </option>
            <?php } ?>
        </select>
        <input type="submit" value="Filtrar">
        </form>
        <hr>

        <a href="insertar.php">Añadir película</a>
    <br><br>

    <table border="1">
        <tr>
            <th>Título</th>
            <th>Saga</th>
            <th>Año</th>
            <th>Descripción</th>
            <th>Puntuación</th>
            <th>Acciones</th>
        </tr>
        <?php while ($f = $peliculas->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $f['titulo']; ?></td>
                    <td><?php echo $f['saga']; ?></td>
                    <td><?php echo $f['anyo']; ?></td>
                    <td><?php echo $f['descripcion']; ?></td>
                    <td><?php echo $f['puntuacion']; ?></td>
                    <td>
                        <a href=" editar.php?id=<?php echo $f['id_pelicula']; ?>">Editar</a> |
                <a href="listar.php?eliminar=<?php echo $f['id_pelicula']; ?>"
                    onclick="return confirm('¿Eliminar?')">Eliminar</a>
                </td>
                </tr>
        <?php } ?>
        </table>
</body>

</html>