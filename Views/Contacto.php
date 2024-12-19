<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctanos</title>
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="../Estilos/menu.css">
    <link rel="stylesheet" href="../Estilos/formulario.css">
</head>
<body>
    <nav class="menu">
        <a href="Index.php" class="menu-link">Inicio</a>
        <a href="Ayuda.php" class="menu-link">Ayuda</a>
        <a href="Donaciones.php" class="menu-link">Donaciones</a>
        <a href="Mapa.php" class="menu-link">Mapa</a>
        <a href="Contacto.php" class="menu-link active">Contáctanos</a>
        <a href="Nosotros.php" class="menu-link">Nosotros</a>
        <a href="RegistroVoluntarios.php" class="menu-link">Registro de Voluntarios</a>
        <a href="Noticias.php" class="menu-link">Noticias</a>
        <a href="../Clases/logout.php" class="menu-link">Cerrar Sesión</a>
    </nav>

    <h1 class="titulo-contacto">Formulario de Contacto</h1>

    <div class="form-container">
        <form action="../Clases/procesarFormulario.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="input-field" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" class="input-field" required>

            <label for="cedula">Cédula:</label>
            <input type="text" id="cedula" name="cedula" class="input-field" required>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" class="input-field" required>

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" class="input-field" required>

            <label for="provincia">Provincia:</label>
            <select id="provincia" name="provincia" class="input-select" required>
                <option value="Guanacaste">Guanacaste</option>
                <option value="Alajuela">Alajuela</option>
                <option value="San José">San José</option>
                <option value="Heredia">Heredia</option>
                <option value="Cartago">Cartago</option>
                <option value="Limón">Limón</option>
                <option value="Puntarenas">Puntarenas</option>
            </select>

            <label for="ayuda">¿Qué tipo de ayuda necesita?</label>
            <textarea id="ayuda" name="ayuda" class="input-textarea" rows="5" required></textarea>

            <button type="submit" class="btn-submit">Enviar</button>
        </form>
    </div>
</body>
</html>