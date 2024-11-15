<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa Interactivo de Costa Rica</title>
    <link rel="stylesheet" href="../Estilos/estilos.css">
</head>
<body>

    <nav class="menu-mapa">
        <a href="Index.php" class="menu-link">Inicio</a>
        <a href="Ayuda.php" class="menu-link">Ayuda</a>
        <a href="Donaciones.php" class="menu-link">Donaciones</a>
        <a href="Mapa.php" class="menu-link active">Mapa</a>
        <a href="Contacto.php" class="menu-link">Contáctanos</a>
        <a href="Nosotros.php" class="menu-link">Nosotros</a>
    </nav>

    <h1 class="titulo-mapa">Mapa Interactivo de Costa Rica</h1>

    <div class="province-container">
        <button class="province-button guanacaste" onclick="showProvince('Guanacaste')">Guanacaste</button>
        <button class="province-button alajuela" onclick="showProvince('Alajuela')">Alajuela</button>
        <button class="province-button san-jose" onclick="showProvince('San José')">San José</button>
        <button class="province-button heredia" onclick="showProvince('Heredia')">Heredia</button>
        <button class="province-button cartago" onclick="showProvince('Cartago')">Cartago</button>
        <button class="province-button limon" onclick="showProvince('Limón')">Limón</button>
        <button class="province-button puntarenas" onclick="showProvince('Puntarenas')">Puntarenas</button>
    </div>

    <div id="info-container">
        <p id="info">Selecciona una provincia para ver más información</p>
    </div>

    <script src="../script/script.js"></script>
</body>
</html>
