<?php
    isset($_GET);
    $busca=$_GET;
    $tags=["php","servidor","arrays","sesion","get","formularios"];

    //buscando si esta
    if(in_array($busca,$tags))echo "Encontrado";
    else echo "No encontrado";
?>