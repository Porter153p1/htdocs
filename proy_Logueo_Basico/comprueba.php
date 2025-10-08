<?php
    include "usuarios.php";
    session_start(["cookie_lifetime" =>1000000]);
    
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
        $_SESSION["userrange"]= "Admin";
        header('Location: index.php');
    }else{
        header('Location: formulario.php');
    }
?>