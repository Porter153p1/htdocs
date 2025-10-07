<?php
include "biblioteca.php";
/*setcookie("galleta", "valor", time()+3600, "/foo", "midominio.com");
var_dump($_COOKIE);*/

$_SESSION["color"] = "#0000ff";
$_SESSION["coche"] = "peugeot";
$_SESSION["userrange"]= "Admin";
$color = $_SESSION["color"];

header('Location: testsesion.php');
exit();
?>