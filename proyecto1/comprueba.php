<?php
    include "usuarios.php";
    $nombre = $_GET["nombre"];
    $password = $_GET["password"];
    echo $nombre;
    echo $password;

    if($nombre=="pepe"&& $password=="123")
    {
        $es_Admin=true;
    }else{
        $es_Admin=false;
    }

    echo "Pasamos a comprueba";
?>