
<?php
include("Config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $provincia = $_POST['provincia'];
    $ayuda = $_POST['ayuda'];

    $sql = "INSERT INTO contacto (nombre, apellido, cedula, telefono, correo, provincia, ayuda) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $nombre, $apellido, $cedula, $telefono, $correo, $provincia, $ayuda);

    if ($stmt->execute()) {
        echo "<script>alert('Información enviada exitosamente.'); window.location.href='../Views/Contacto.php';</script>";
    } else {
        echo "<script>alert('Error al enviar la información.'); window.location.href='../Views/Contacto.php';</script>";
    }

    $stmt->close();
}
?>
