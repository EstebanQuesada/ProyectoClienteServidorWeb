<?php
include("Config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];

    $sql = "INSERT INTO voluntarios (nombre, apellido, correo, telefono, direccion) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $apellido, $correo, $telefono, $direccion);

    if ($stmt->execute()) {
        echo "<script>alert('¡Registro exitoso! Gracias por ser voluntario.'); window.location.href='../Views/Index.php';</script>";
    } else {
        echo "<script>alert('Error al registrar voluntario. Inténtelo de nuevo.'); window.history.back();</script>";
    }
    $stmt->close();
}
?>
