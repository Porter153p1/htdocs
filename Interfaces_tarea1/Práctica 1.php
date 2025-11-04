<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if(isset($_POST["Nombre"])) $Nombre = $_POST["Nombre"];
                else $Nombre="";
                if(isset($_POST["Descripción"])) $Descripción = $_POST["Descripción"];
                else $Descripción="";
                if(isset($_POST["Añadir"])) $Añadir = $_POST["Añadir"];
                else $Añadir="";
            }echo "Error";
            echo $Nombre;
            echo $Descripción;
            if($Añadir)echo "true";
            else echo "false";
        ?>
    </body>
</html>