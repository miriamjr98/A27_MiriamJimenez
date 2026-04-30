<?php
session_start();
require_once'conexion.php';
$error="";

#Procesa el inicio de sesión compara usuario y contraseña con la tabla de usuarios.
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario_post = $_POST['usuario']; 
    $pass_post = $_POST['contrasenya'];

    $resultado = $conn->query("SELECT * FROM usuarios WHERE nombre='$usuario_post' AND contrasenya='$pass_post'");
    
    if ($resultado->num_rows == 1){
        $_SESSION['usuario'] = $usuario_post; 
        header("Location: index.php");
        exit();
    } else {
        $error = "Contraseña o usuario incorrectos.";
    }
}
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Login</h1>
    <?php if ($error != "")
        echo "<p>$error</p>"; ?>
    <form method="POST">
        Usuario: <input type="text" name="usuario"><br><br>
        Contraseña: <input type="password" name="contrasenya"><br><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>