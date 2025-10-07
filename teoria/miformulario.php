<?php
if(isset($_GET["nombre"])) $nombre = $_GET["nombre"];
else $nombre="";
?>
<!--Se necesita para usar esto después value=<?php echo $nombre;?>-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form action="script.php" method="GET">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value=<?php echo $nombre;?>>
        <!--value=<?php echo $nombre;?> pone por defecto lo que tenemos guardado-->
        <br><br>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email">
        <br><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password">
        <br><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" min="1" max="120">
        <br><br>

        <label for="fecha">Fecha de nacimiento:</label>
        <input type="date" id="fecha" name="fecha">
        <br><br>

        <label for="pais">País:</label>
        <select id="pais" name="pais">
            <option value="">--Seleccione--</option>
            <option value="mx">México</option>
            <option value="es">España</option>
            <option value="ar">Argentina</option>
        </select>
        <br><br>

        <p>Género:</p>
        <input type="radio" id="masc" name="genero" value="masculino">
        <label for="masc">Masculino</label>
        <input type="radio" id="fem" name="genero" value="femenino">
        <label for="fem">Femenino</label>
        <input type="radio" id="otro" name="genero" value="otro">
        <label for="otro">Otro</label>
        <br><br>

        <input type="checkbox" id="terminos" name="terminos" required>
        <label for="terminos">Acepto los términos y condiciones</label>
        <br><br>
        
        <label for="residency">Tipo de Vivienda</label>
        <select name="residency">
            <option value="">--Seleccione--</option>
            <option value="Alquiler">Alquiler</option>
            <option value="Propiedad con hipoteca">Propiedad con hipoteca</option>
            <option value="Propiedad sin hipoteca">Propiedad sin hipoteca</option>
        </select>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>