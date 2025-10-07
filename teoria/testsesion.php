<?php
include "biblioteca.php";
unset($_SESSION["color"]);

if(isset($_SESSION["color"])){
    $color=$_SESSION["color"];
}else $color=NULL;

$coche=$_SESSION["coche"];

if($color=="#6576576") echo $_SESSION['color'];
    else echo "No tienes privilegios";

echo "<br>", $coche;

$userrange=$_SESSION["userrange"];
if($userrange=="Admin"){
    header('Location: test.php');
    exit;
}else{
    header('Location: miformulario.php');
    exit;
}
?>