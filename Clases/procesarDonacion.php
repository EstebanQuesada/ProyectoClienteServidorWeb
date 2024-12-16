<?php
include("Config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $monto = $_POST["monto"];
    $metodo = $_POST["metodo"];

    $sql = "INSERT INTO donaciones (nombre, monto, metodo_pago, fecha_donacion) VALUES (?, ?, ?, NOW())";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sds", $nombre, $monto, $metodo);

    if ($stmt->execute()) {
        echo "<script>alert('¡Gracias por tu donación!'); window.location.href='../Views/Donaciones.php';</script>";
    } else {
        echo "<script>alert('Error al procesar la donación'); window.history.back();</script>";
    }
    $stmt->close();
}
?>
