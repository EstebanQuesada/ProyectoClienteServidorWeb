<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayudemos a Costa Rica</title>
    <link rel="stylesheet" href="../Estilos/estilos.css">
</head>
<body>
    <div class="container">
        <h1 class="titulo-index">Ayudemos a Costa Rica!</h1>
        <div class="vertical-menu">
            <a href="Ayuda.php" class="menu-item">Ayuda</a>
            <a href="Donaciones.php" class="menu-item">Donaciones</a>
            <a href="Mapa.php" class="menu-item">Mapa</a>
            <a href="Contacto.php" class="menu-item">Contáctanos</a>
            <a href="Nosotros.php" class="menu-item">Nosotros</a>
            <a href="Noticias.php" class="menu-link">Noticias</a>
            <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
                <a href="../Clases/AgregarNoticia.php" class="menu-link">Agregar Noticia</a>
            <?php endif; ?> 
            <a href="../Clases/logout.php" class="menu-item">Cerrar Sesión</a>       
        </div>
    </div>
</body>
</html>

