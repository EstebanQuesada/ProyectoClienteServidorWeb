<?php
include("Config.php");
session_start();

if (!isset($_SESSION['username']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../Views/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];

    $sql = "INSERT INTO noticias (titulo, contenido) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $titulo, $contenido);

    if ($stmt->execute()) {
        echo "<script>alert('Noticia agregada con éxito'); window.location.href = 'AgregarNoticia.php';</script>";
    } else {
        echo "<script>alert('Error al agregar la noticia');</script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Noticia</title>
    <link rel="stylesheet" href="../Estilos/estilos.css">
</head>
<body>
    <nav class="menu">
        <a href="../Views/Index.php" class="menu-link">Inicio</a>
        <a href="../Views/Noticias.php" class="menu-link">Ver Noticias</a>
        <a href="../Clases/logout.php" class="menu-link">Cerrar Sesión</a>
    </nav>

    <div class="form-container">
        <h1 class="titulo-contacto">Agregar Nueva Noticia</h1>
        <form action="AgregarNoticia.php" method="POST" class="donar-form">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Título de la noticia" required>

            <label for="contenido">Contenido:</label>
            <textarea id="contenido" name="contenido" rows="5" placeholder="Contenido de la noticia" required></textarea>

            <button type="submit" class="btn-submit">Agregar Noticia</button>
        </form>
    </div>
</body>
</html>
