<?php
include("Config.php");
session_start();
if ($_SESSION['rol'] != 'admin') {
    header("Location: Index.php");
    exit();
}

$result = $conn->query("SELECT * FROM donaciones");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="../Estilos/estilos.css">
</head>
<body>
    <h1>Panel de Administración</h1>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Monto</th>
            <th>Método de Pago</th>
            <th>Fecha</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= htmlspecialchars($row['nombre']) ?></td>
            <td><?= $row['monto'] ?></td>
            <td><?= htmlspecialchars($row['metodo_pago']) ?></td>
            <td><?= $row['fecha_donacion'] ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
