<?php
    if(isset($_GET["name"]))$name = $_GET["name"];
    else $name="";

    if(isset($_GET["password"])) $password = $_GET["password"];
    else $password="";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .logueo{
                text-align: center;
                margin-top: 50px;
            }
        </style>
    </head>
    <body>
        <div class="logueo">
            <form action="comprueba.php" method="GET">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" autocomplete="off">
                <br><br>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" autocomplete="off">
                <br><br>
                <button type="submit">Login</button>
            </form>
        </div>
    </body>
</html>