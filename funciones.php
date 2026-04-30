<?php
//Comprueba si el usuario ha pasado por el login.
function comprobarSesion()
{
    if (!isset($_SESSION['usuario'])) {
        header("Location: login.php");
        exit();
    }
}

//Obtiene el listado completo de la tabla películas.

function obtenerPeliculas($conn)
{
    return $conn->query("SELECT * FROM peliculas");
}

//Extrae las sagas disponibles sin duplicados para el filtro.

function obtenerSagas($conn)
{
    return $conn->query("SELECT DISTINCT saga FROM peliculas");
}

//Filtra los resultados de la base de datos por el nombre de la saga.
function obtenerPeliculasPorSaga($conn, $saga)
{
    return $conn->query("SELECT * FROM peliculas WHERE saga='$saga'");
}

//Busca una película concreta por su ID para poder editarla.
function obtenerPeliculaPorId($conn, $id)
{
    return $conn->query("SELECT * FROM peliculas WHERE id_pelicula=$id")->fetch_assoc();
}

//Elimina el registro seleccionado.
function eliminarPelicula($conn, $id)
{
    $conn->query("DELETE FROM peliculas WHERE id_pelicula=$id");
}
?>