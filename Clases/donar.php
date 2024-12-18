<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donar</title>
    <link rel="stylesheet" href="../Estilos/estilos.css">
</head>
<body>
    <nav class="menu">
        <a href="../Views/Index.php" class="menu-link">Inicio</a>
        <a href="../Views/Ayuda.php" class="menu-link">Ayuda</a>
        <a href="../Views/Donaciones.php" class="menu-link active">Donaciones</a>
        <a href="../Views/Mapa.php" class="menu-link">Mapa</a>
        <a href="../Views/Contacto.php" class="menu-link">Contáctanos</a>
        <a href="../Views/Nosotros.php" class="menu-link">Nosotros</a>
        <a href="../Views/RegistroVoluntarios.php" class="menu-link">Registro de Voluntarios</a>
        <a href="../Views/Noticias.php" class="menu-link">Noticias</a>
        <a href="logout.php" class="menu-link">Cerrar Sesión</a>
   
    </nav>

    <div class="form-container">
        <h1 class="titulo-contacto">Realiza Tu Donación</h1>
        <form action="procesarDonacion.php" method="POST" class="donar-form">
            <label for="nombre">Nombre Completo:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre completo" required>

            <label for="monto">Monto de la Donación (USD):</label>
            <input type="number" id="monto" name="monto" placeholder="Ejemplo: 20.00" min="1" step="0.01" required>

            <label for="metodo">Método de Pago:</label>
            <select id="metodo" name="metodo" required>
                <option value="Tarjeta">Tarjeta de Crédito/Débito</option>
                <option value="PayPal">PayPal</option>
                <option value="Transferencia">Transferencia Bancaria</option>
            </select>

            <button type="submit" class="btn-submit">Donar Ahora</button>
        </form>
    </div>

    <script>
    document.querySelector('.donar-form').addEventListener('submit', function(e) {
        e.preventDefault(); 

        const formData = {
            nombre: document.getElementById('nombre').value,
            monto: document.getElementById('monto').value,
            metodo: document.getElementById('metodo').value
        };

        fetch('Donacion.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(formData)
        })
        .then(response => response.json()) 
        .then(data => {
            alert(data.message); 
            if (data.status === 'success') {
                window.location.href = '../Views/Donaciones.php'; 
            }
        })
        .catch(error => console.error('Error:', error)); 
    });
    </script>
</body>
</html>
