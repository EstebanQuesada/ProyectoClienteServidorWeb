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
    <title>Sección Educativa</title>
    <link rel="stylesheet" href="../Estilos/estilos.css">
</head>
<body>
    <nav class="menu">
        <a href="Index.php" class="menu-link">Inicio</a>
        <a href="Ayuda.php" class="menu-link">Ayuda</a>
        <a href="Donaciones.php" class="menu-link active">Donaciones</a>
        <a href="Mapa.php" class="menu-link">Mapa</a>
        <a href="Contacto.php" class="menu-link">Contáctanos</a>
        <a href="Nosotros.php" class="menu-link">Nosotros</a>
        <a href="RegistroVoluntarios.php" class="menu-link">Registro de Voluntarios</a>
        <a href="Noticias.php" class="menu-link">Noticias</a>
        <a href="seccionEducativa.php" class="menu-link active">Sección Educativa</a>
        <a href="../Clases/logout.php" class="menu-link">Cerrar Sesión</a>
    </nav>

    <div class="educativa-container">
        <h1 class="titulo-educativa">Sección Educativa sobre Desastres Naturales</h1>

        <section class="educativa-section">
            <h2>Guías Descargables</h2>
            <div class="educativa-guias">
                <a href="../guias/guia_preparacion.pdf" target="_blank" class="btn-descargar">Guía de Preparación</a>
            </div>
        </section>
    </div>
</body>
</html>
