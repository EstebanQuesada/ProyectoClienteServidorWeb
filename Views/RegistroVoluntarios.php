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
    <title>Registro de Voluntarios</title>
    <link rel="stylesheet" href="../Estilos/estilos.css">
</head>
<body>
    <nav class="menu">
        <a href="Index.php" class="menu-item">Inicio</a>
        <a href="RegistroVoluntarios.php" class="menu-item active">Registro de Voluntarios</a>
        <a href="../Clases/logout.php" class="menu-item">Cerrar Sesión</a>
    </nav>

    <div class="form-container">
        <h1 class="titulo-contacto">Registro de Voluntarios</h1>
        <form action="../Clases/procesarVoluntarios.php" method="POST" class="donar-form">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" placeholder="Ingresa tu apellido" required>

            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" placeholder="Ingresa tu correo electrónico" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" required>

            <label for="direccion">Dirección:</label>
            <textarea id="direccion" name="direccion" placeholder="Ingresa tu dirección" rows="4" required></textarea>

            <button type="submit" class="btn-submit">Registrarse</button>
        </form>
    </div>
</body>
</html>
