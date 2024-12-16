<?php
include("../Clases/Config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias y Consejos</title>
    <link rel="stylesheet" href="../Estilos/estilos.css">
</head>
<body>
    <nav class="menu">
        <a href="Index.php" class="menu-link">Inicio</a>
        <a href="Noticias.php" class="menu-link active">Noticias</a>
        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
            <a href="../Clases/AgregarNoticia.php" class="menu-link">Agregar Noticia</a>
        <?php endif; ?>
        <a href="../Clases/logout.php" class="menu-link">Cerrar Sesión</a>
    </nav>

    <div class="noticias-container">
        <h1 class="titulo-contacto">Noticias y Consejos</h1>

        <?php
        $sql = "SELECT * FROM noticias ORDER BY fecha DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0):
            while ($row = $result->fetch_assoc()):
        ?>
            <div class="noticia-box">
                <h2><?php echo htmlspecialchars($row['titulo']); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($row['contenido'])); ?></p>
                <span class="noticia-fecha"><?php echo $row['fecha']; ?></span>
            </div>
        <?php
            endwhile;
        else:
            echo "<p>No hay noticias disponibles en este momento.</p>";
        endif;
        ?>
    </div>
</body>
</html>
