<?php
#Ejercicio 1
//Guardando mis datos de usuario
$IP= "187.33.149.48";
$IPm= "187.33.149.481234"; //IP que he usado para que me de errores
$Usuario= "user03";
$Contraseña= 128640;
$BD= "user03DB";

//He intentado quitar los warnings pero no me ha salido
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = new mysqli($IP,$Usuario,$Contraseña,$BD); //Conectandome a la base de datos con mis datos

//Comprobando si la conexión ha salido bien
if ($conn->connect_errno){
    die("Algo ha salido mal".$conn->connect_errno);
    //die("Algo ha salido mal :(")
    //El mensaje de error si le fuera haber quitado los mensajes de warning para que no se filtre la IP
}