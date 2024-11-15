<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctanos</title>
    <link rel="stylesheet" href="../Estilos/estilos.css">
</head>
<body>

    <nav class="menu">
        <a href="Index.php" class="menu-link">Inicio</a>
        <a href="Ayuda.php" class="menu-link">Ayuda</a>
        <a href="Donaciones.php" class="menu-link">Donaciones</a>
        <a href="Mapa.php" class="menu-link">Mapa</a>
        <a href="Contacto.php" class="menu-link active">Contáctanos</a>
        <a href="Nosotros.php" class="menu-link">Nosotros</a>
    </nav>

    <h1 class="titulo-contacto">Formulario de Contacto</h1>

    <div class="form-container">
        <form action="procesarFormulario.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>

            <label for="cedula">Cédula:</label>
            <input type="text" id="cedula" name="cedula" required>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required>

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="provincia">Provincia:</label>
            <select id="provincia" name="provincia" required>
                <option value="Guanacaste">Guanacaste</option>
                <option value="Alajuela">Alajuela</option>
                <option value="San José">San José</option>
                <option value="Heredia">Heredia</option>
                <option value="Cartago">Cartago</option>
                <option value="Limón">Limón</option>
                <option value="Puntarenas">Puntarenas</option>
            </select>

            <label for="ayuda">¿Qué tipo de ayuda necesita?</label>
            <textarea id="ayuda" name="ayuda" rows="5" required></textarea>

            <button type="submit" class="btn-submit">Enviar</button>
        </form>
    </div>
</body>
</html>