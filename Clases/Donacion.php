<?php
include("Config.php");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $nombre = $data["nombre"];
    $monto = $data["monto"];
    $metodo = $data["metodo"];

    $sql = "INSERT INTO donaciones (nombre, monto, metodo_pago, fecha_donacion) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sds", $nombre, $monto, $metodo);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Donación registrada."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al registrar la donación."]);
    }
    $stmt->close();
}
