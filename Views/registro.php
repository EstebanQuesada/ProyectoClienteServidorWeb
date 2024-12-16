<?php
include("../Clases/Config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $rol = "user";

    $sql = "INSERT INTO user (username, password, rol) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $rol);

    if ($stmt->execute()) {
        echo "<script>alert('Usuario registrado exitosamente'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Error al registrar usuario');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../Estilos/estilos.css">
</head>
<body>
    <div class="login-container">
        <h1 class="login-title">Registro</h1>
        <form method="post" action="registro.php" class="login-form">
            <label for="username" class="login-label">Usuario:</label>
            <input type="text" name="username" id="username" class="login-input" required>

            <label for="password" class="login-label">Contraseña:</label>
            <input type="password" name="password" id="password" class="login-input" required>

            <button type="submit" class="login-button">Registrarse</button>
        </form>
    </div>
</body>
</html>
