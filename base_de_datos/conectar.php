<?php
$servername="localhost";
$username="User_db_peluk12333";
$password="-)-M[fLJ)m67g-2!";
$databname="peluqueria";
$tablename="clientes";

//Opción 1
echo "Opción 1: ";
//Creando la conexión con el servidor
$conn = new mysqli($servername, $username, $password, $databname);
//Comprobamso que l aconexión es exitosa
if($conn->connect_error) die("Connection failed: ".$conn->connect_error);
echo "Connected succesful";

echo "<br>";
//Opción 2
echo "Opción 2: ";
//Creando la conexión con el servidor
$conn = mysqli_connect($servername, $username, $password, $databname);
//Comprobamso que l aconexión es exitosa
if(!$conn) die("Connection failed: " . mysqli_connect_error());
echo "Connected succesful";

$sql = "INSERT INTO $tablename 
(nombre, apellidos, telefono, publicidad, peluquero, ultima, correo) 
VALUES ('Manuel', 'Gutiérrez', '+3466666666', 1, 'Carolina', '', 'email@email.com')";

if($conn->query($sql) == true) echo "Insercción correcta en la tabla $tablename<br>";
else echo "Error: $conn->error";

?>