<?php
    if(isset($_SESSION))echo "Hola $usuario";
    else {
        header("panel.php");
    }
?>