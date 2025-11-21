<?php
// Comprobar método POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "<h2>Acceso no permitido</h2>";
    exit;
}

// Recoger datos
$datos = $_POST;

// Variables para Leaflet y Chart.js
$lat = $_POST["latitud"];
$lon = $_POST["longitud"];
$ocupacion = $_POST["ocupacion"];
$nombre = $_POST["nombre"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Procesamiento de Datos</title>

    <link rel="stylesheet" type="text/css" href="estilos_procesamiento.css">

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

<h1>Datos Recibidos</h1>

<table>
    <tr><th>Campo</th><th>Valor Introducido</th></tr>

    <?php
        foreach ($datos as $campo => $valor) {
            echo "<tr><td>$campo</td><td>$valor</td></tr>";
        }
    ?>
</table>

<br><hr><br>

<h2>Gráfico del Nivel de Ocupación</h2>
<canvas id="grafico" width="300" height="200"></canvas>

<script>
    const ctx = document.getElementById('grafico');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Ocupación', 'Libre'],
            datasets: [{
                data: [<?php echo $ocupacion; ?>, 100 - <?php echo $ocupacion; ?>]
            }]
        }
    });
</script>

<br><hr><br>

<h2>Mapa de Ubicación (Leaflet)</h2>

<div id="mapa"></div>

<script>
    var map = L.map('mapa').setView([<?php echo $lat; ?>, <?php echo $lon; ?>], 14);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
    }).addTo(map);

    L.marker([<?php echo $lat; ?>, <?php echo $lon; ?>])
        .addTo(map)
        .bindPopup("<b><?php echo $nombre; ?></b><br>Lat: <?php echo $lat; ?><br>Lon: <?php echo $lon; ?>")
        .openPopup();
</script>

<br><hr><br>

<h3>Navegación</h3>
<ul>
    <li><a href="registro.html">Volver al formulario</a></li>
</ul>

</body>
</html>
