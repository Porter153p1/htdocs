<?php
if(isset($_GET))
    {
        header("encontrado.php");
    }
?>
<!Doctype html>
    <html>
    <head>
        <UTF-8>
    </head>
    <body>
        <form action="./encontrado.php" method="$_GET">
            <label for="busqueda">Busqueda</label>
            <input type="text" name="busqueda" id="busqueda"><br>
            <input type="button" value="Enviar">
        </form>
    </body>
</html>