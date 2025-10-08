<?php
    include "usuarios.php";
    session_start(["cookie_lifetime" =>1000000]);


    if(isset($_SESSION["userrange"]))$userrange = $_SESSION["userrange"];
    else $userrange="";

    if($userrange=="Admin"){
        include "pagina.html";
    }else {
        header('Location: formulario.php');
    }
?>