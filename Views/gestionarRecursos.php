<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../Views/login.php");
    exit();
}

include("../Clases/Config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO recursos (tipo, nombre, cantidad, descripcion) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $tipo, $nombre, $cantidad, $descripcion);
    $stmt->execute();
    $stmt->close();
}

$sql = "SELECT * FROM recursos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Recursos</title>
    <link rel="stylesheet" href="../Estilos/estilos.css">
</head>
<body>
    <nav class="menu">
        <a href="Index.php" class="menu-link">Inicio</a>
        <a href="gestionarRecursos.php" class="menu-link active">Gestión de Recursos</a>
        <a href="../Clases/logout.php" class="menu-link">Cerrar Sesión</a>
    </nav>

    <div class="form-container">
        <h1 class="titulo-contacto">Gestión de Recursos</h1>

        <form action="gestionarRecursos.php" method="POST">
            <label for="tipo">Tipo de Recurso:</label>
            <select name="tipo" id="tipo" required>
                <option value="Alimentos">Alimentos</option>
                <option value="Medicinas">Medicinas</option>
                <option value="Ropa">Ropa y Suministros</option>
            </select>

            <label for="nombre">Nombre del Recurso:</label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" required>

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="3"></textarea>

            <button type="submit" class="btn-submit">Agregar Recurso</button>
        </form>
    </div>

    <div class="form-container">
        <h2 class="titulo-contacto">Inventario Actual</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Última Actualización</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['tipo']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td><?php echo $row['fecha_actualizacion']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
