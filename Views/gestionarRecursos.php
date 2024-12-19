<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../Views/login.php");
    exit();
}

include("../Clases/Config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] === 'agregar') {
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] === 'restar') {
    $id_recurso = (int)$_POST['id_recurso'];
    $cantidad_a_restar = (int)$_POST['cantidad'];

    $sql = "SELECT cantidad FROM recursos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_recurso);
    $stmt->execute();
    $stmt->bind_result($cantidad_actual);
    $stmt->fetch();
    $stmt->close();

    if ($cantidad_actual >= $cantidad_a_restar) {
        $sql = "UPDATE recursos SET cantidad = cantidad - ?, fecha_actualizacion = CURRENT_TIMESTAMP WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $cantidad_a_restar, $id_recurso);
        $stmt->execute();
        $stmt->close();
        echo "<p>Cantidad actualizada correctamente.</p>";
    } else {
        echo "<p>Error: Cantidad insuficiente o recurso no encontrado.</p>";
    }
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
            <input type="hidden" name="accion" value="agregar">
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
        <h2 class="titulo-contacto">Restar Cantidades del Inventario</h2>

        <form action="gestionarRecursos.php" method="POST">
            <input type="hidden" name="accion" value="restar">
            <label for="id_recurso">Seleccionar Recurso:</label>
            <select name="id_recurso" id="id_recurso" required>
                <?php
                $result_select = $conn->query("SELECT id, nombre FROM recursos");
                while ($row_select = $result_select->fetch_assoc()): ?>
                    <option value="<?php echo $row_select['id']; ?>">
                        <?php echo $row_select['nombre']; ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label for="cantidad">Cantidad a Restar:</label>
            <input type="number" name="cantidad" id="cantidad" min="1" required>

            <button type="submit" class="btn-submit">Restar Cantidad</button>
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
