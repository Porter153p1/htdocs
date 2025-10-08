<?php
session_start(["cookie_lifetime" =>1]);
    if(isset($_SESSION["userrange"]))$userrange = $_GET["userrange"];
    else $userrange="";

    if($userrange=="Admin"){
        echo "Es admin <br>";
    }else {
        header('Location: formulario.php');
    }
?>