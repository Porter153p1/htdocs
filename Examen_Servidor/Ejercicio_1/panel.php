<?php
if(isset($_SESSION))echo "Hola ". $user;
else header("login.php");
?>