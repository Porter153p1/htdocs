<?php
    include "usuarios.php";
    $name = strtolower($_GET["name"]);
    $password = $_GET["password"];
    $es_Admin = true;

    if($name==$nameAdmin && $password==$passwordAdmin)
    {
        $es_Admin=true;
    }else{
        $es_Admin=false;
    }

    if($es_Admin){
        
        header('Location: index.php');
    }else{
        header('Location: formulario.php');
    }
?>