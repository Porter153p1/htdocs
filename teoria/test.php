<?php
    $nombre = $_GET["nombre"];
    $edad= $_GET["edad"];
    $fecha= $_GET["fecha"];
    $pais= $_GET["pais"];
    $residency= $_GET["residency"];


    echo "Este eres tu nombre:$nombre edad:$edad fecha de nacimiento: $fecha que tipo de vivienda $residency";
    echo "<br><br>";
    print_r($pais);
?>