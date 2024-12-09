<!DOCTYPE html>
<html>

<head>
    <!--METADATOS-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desastres Naturales</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
    include('Index.php')
    ?>
    <main>
        <h1>Inicio de sesion</h1>
        <form method="post" action="procesar_login.php">
            <label>Usuario:</label><br>
            <input type="text" name="username" id="username"><br>
            <label>Clave:</label><br>
            <input type="password" name="password" id="password"><br>
            <button type="submit">Iniciar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Desastres Naturales - Todos los derechos reservados</p>
        <p><a href="privacidad.html">Politica de privacidad</a> | <a href="terminos.html">Terminos y condiciones</a></p>
    </footer>
</body>

</html>