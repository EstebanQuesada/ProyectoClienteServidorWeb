<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header("Location: Views/login.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayudemos a Costa Rica</title>
    <link rel="stylesheet" href="Estilos/estilos.css">
</head>
<body>
    <div class="container">
        <h1 class="titulo-index">Ayudemos a Costa Rica!</h1>
        <div class="vertical-menu">
            <a href="Views/Ayuda.php" class="menu-item">Ayuda</a>
            <a href="Views/Donaciones.php" class="menu-item">Donaciones</a>
            <a href="Views/Mapa.php" class="menu-item">Mapa</a>
            <a href="Views/Contacto.php" class="menu-item">Contáctanos</a>
            <a href="Views/Nosotros.php" class="menu-item">Nosotros</a>
            <a href="Views/Noticias.php" class="menu-link">Noticias</a>
            <a href="Clases/logout.php" class="menu-item">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>
