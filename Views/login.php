<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: Index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../Estilos/estilos.css">
</head>
<body>
    <div class="login-container">
        <h1 class="login-title">Inicio de Sesión</h1>
        <form method="post" action="../Clases/procesar_login.php" class="login-form">
            <label for="username" class="login-label">Usuario:</label>
            <input type="text" name="username" id="username" class="login-input" placeholder="Ingresa tu usuario" required>

            <label for="password" class="login-label">Contraseña:</label>
            <input type="password" name="password" id="password" class="login-input" placeholder="Ingresa tu contraseña" required>

            <button type="submit" class="login-button">Iniciar Sesión</button>
        </form>
        <p class="login-footer">
            ¿No tienes cuenta? <a href="registro.php" class="login-link">Registrarse</a>
        </p>
    </div>
</body>
</html>
