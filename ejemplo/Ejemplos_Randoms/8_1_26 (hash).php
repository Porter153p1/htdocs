<?php
$hash=hash("sha512","Hola Holita",false);
 echo "<br>$hash<br>La longitud es;".strlen($hash);

$hash2=hash("sha512","Hola Holita2",false);
echo "<br>$hash2<br>La longitud es;".strlen($hash2);

$pass="mipass";
$usern="Javi";
$range="admin";
$passhash=hash("sha512", $pass, false);

$HOST = "localhost";
$USER = "root";
$PASS = "";
$DB = "tienda";

try{
    $conn=new mysqli($HOST, $USER, $PASS, $DB);
}catch(mysqli_sql_exception $e){
    die("Imposible conectar");
}

$result= $conn->query("INSERT into Users (nombre, password, rango)
VALUES('$usern', '$passhash', '$range')");