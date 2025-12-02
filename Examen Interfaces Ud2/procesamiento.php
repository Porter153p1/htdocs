<?php
//Guardando los valores para usar mas adelante y validando que esten definidos
$datos=$_POST;
if(is_null($datos)) throw new Error("Esta mal");

$Latitud=$_POST["Latitud"];
if(!isset($_POST["Latitud"])) throw new Error("Esta mal");

$Longitud=$_POST["Longitud"];
if(!isset($_POST["Longitud"])) throw new Error("Esta mal");

$Trimestre1=$_POST["Trimestre1"];
if(!isset($_POST["Trimestre1"])) throw new Error("Esta mal");

$Trimestre2=$_POST["Trimestre2"];
if(!isset($_POST["Trimestre2"])) throw new Error("Esta mal");

$Trimestre3=$_POST["Trimestre3"];
if(!isset($_POST["Trimestre3"])) throw new Error("Esta mal");

$Trimestre4=$_POST["Trimestre4"];
if(!isset($_POST["Trimestre4"])) throw new Error("Esta mal");

$Nombre=$_POST["Nombre"];
if(!isset($_POST["Nombre"])) throw new Error("Esta mal");


?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilos_procesamiento.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Datos Meteorológico</title>

        <!-- Leaflet CSS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

        <!-- Leaflet JS -->
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <style>
            /* Estilo del mapa */
            #mapa {
                width: 80%;
                max-width: 800px;
                height: 400px;
                margin: 30px auto;
                border: 2px solid #7d7d7d;
                border-radius: 10px;
            }
        </style>

        <!-- Cargar Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>
        <h1>Datos Recibidos</h1>

        <table>
            <tr>
                <th>Campo</th>
                <th>Valor Introducido</th>
            </tr>

            <?php
                foreach ($datos as $campo => $valor) {
                    echo "<tr>
                            <td>$campo</td>
                            <td>$valor</td>
                        </tr>";
                }
            ?>
        </table>
    <h1>Ejemplo de mapa con Leaflet</h1>

    <!-- Div donde se mostrará el mapa -->
    <div id="mapa"></div>

    <script>
        // 1️⃣ Crear el mapa y centrarlo en coordenadas
        const map = L.map('mapa').setView([<?php echo $Latitud?>, <?php echo $Longitud?>], 6); // Madrid por defecto

        // 2️⃣ Añadir capa de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19
        }).addTo(map);

        // 3️⃣ Añadir un marcador
        const marcador = L.marker([<?php echo $Latitud?>, <?php echo $Longitud?>]).addTo(map);
        marcador.bindPopup(<?php echo $Nombre?>).openPopup();

    </script>

    <h1>Ejemplo de gráfico con Chart.js</h1>

    <!-- Canvas donde se dibuja el gráfico -->
    <canvas id="miGrafico"></canvas>

    <script>
        // 1️⃣ Obtener el contexto del canvas
        const ctx = document.getElementById('miGrafico');

        // 2️⃣ Crear el gráfico
        const miGrafico = new Chart(ctx, {
            type: 'bar', // Tipo de gráfico: 'bar', 'line', 'pie', etc.
            data: {
                labels: ['Trimestre1', 'Trimestre2', 'Trimestre3', 'Trimestre4'], // Etiquetas del eje X
                datasets: [{
                    label: 'Temperatura (°C)', // Leyenda del conjunto de datos
                    data: [<?php echo $Trimestre1;?>, <?php echo $Trimestre2;?>, <?php echo $Trimestre3;?>, <?php echo $Trimestre4;?>],     // Datos a mostrar
                    backgroundColor: [
                        '#9ec5ff'
                    ],
                    borderColor: '#7d7d7d',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,         // Se adapta al tamaño del canvas
                plugins: {
                    legend: {
                        display: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    </body>
</html>