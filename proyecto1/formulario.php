<?php
if(isset($_GET["nombre"])) $nombre = $_GET["nombre"];
else $nombre="";
if(isset($_GET["password"])) $nombre = $_GET["password"];
else $password="";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Login</h1>
    <form action="comprueba.php" method="GET">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value=<?php echo $nombre;?>>
        <br><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" value=<?php echo $password;?>>
        <br><br>
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>