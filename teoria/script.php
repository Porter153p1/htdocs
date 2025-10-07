<?php
    $nombre = $_GET["nombre"];
    $fecha= $_GET["fecha"];
    $pais= $_GET["pais"];
    $residency= $_GET["residency"];

    if (isset($_GET["edad"]))
    {
        $edad=$_GET["edad"];
    }else $edad=0;

    if($edad===NULL) $edad=-1;
    
    if($edad==-1)
        {
            header('Location:/miformulario.php?nombre=$nombre');
        }

    echo "Este eres tu nombre:$nombre edad:$edad fecha de nacimiento: $fecha que tipo de vivienda $residency";
    echo "<br><br>";
    print_r($pais);
?>