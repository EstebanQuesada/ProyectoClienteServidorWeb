<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa de Zonas Afectadas</title>
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        #map {
            height: 600px;
            width: 100%;
            margin-top: 60px;
        }
    </style>
</head>
<body>
    <nav class="menu">
        <a href="Index.php" class="menu-link">Inicio</a>
        <a href="Ayuda.php" class="menu-link">Ayuda</a>
        <a href="Donaciones.php" class="menu-link">Donaciones</a>
        <a href="Mapa.php" class="menu-link active">Mapa</a>
        <a href="Contacto.php" class="menu-link">Contáctanos</a>
        <a href="Nosotros.php" class="menu-link">Nosotros</a>
        <a href="RegistroVoluntarios.php" class="menu-link">Registro de Voluntarios</a>
        <a href="Views/Noticias.php" class="menu-link">Noticias</a>
        <a href="../Clases/logout.php" class="menu-link">Cerrar Sesión</a>
    </nav>

    <h1 class="titulo-contacto">Mapa de Zonas Afectadas</h1>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Inicializar el mapa
        var map = L.map('map').setView([9.7489, -83.7534], 8); // Coordenadas centrales de Costa Rica

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        var zonas = [
            { nombre: "San José", lat: 9.9281, lng: -84.0907, nivel: "media" },
            { nombre: "Alajuela", lat: 10.0162, lng: -84.2116, nivel: "media" },
            { nombre: "Cartago", lat: 9.8622, lng: -83.9194, nivel: "no_afectada" },
            { nombre: "Heredia", lat: 10.0039, lng: -84.1165, nivel: "media" },
            { nombre: "Guanacaste", lat: 10.5933, lng: -85.6575, nivel: "afectada" },
            { nombre: "Limón", lat: 9.9907, lng: -83.0358, nivel: "afectada" },
            { nombre: "Puntarenas", lat: 9.9763, lng: -84.8339, nivel: "afectada" }
        ];

        function getColor(nivel) {
            switch (nivel) {
                case "afectada": return "red";
                case "media": return "yellow";
                case "no_afectada": return "green";
                default: return "gray";
            }
        }

        zonas.forEach(function(zona) {
            L.circle([zona.lat, zona.lng], {
                color: getColor(zona.nivel),
                fillColor: getColor(zona.nivel),
                fillOpacity: 0.5,
                radius: 15000 
            }).addTo(map)
            .bindPopup("<b>" + zona.nombre + "</b><br>Nivel de Afectación: " + zona.nivel.replace("_", " "));
        });
    </script>
</body>
</html>
