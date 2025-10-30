<?php
$servername = "localhost";
$username = "User_db_peluk12333";
$password = "-)-M[fLJ)m67g-2!";
$databname = "peluqueria";
$tablename = "clientes";

try{
    $conn = new mysqli("124.554.0.0", $username, $passqord, $databname);
} catch(mysqli_sql_exception $e){
    die("***Error fatal: ".$e->getMessage());
}

// Opción 1
echo "Opción 1: ";
$conn = new mysqli($servername, $username, $password, $databname);
if($conn->connect_error) die("Connection failed: ".$conn->connect_error);
echo "Connected succesful<br>";

// Opción 2 (no necesaria si ya usas mysqli OO)
echo "Opción 2: ";
$conn = mysqli_connect($servername, $username, $password, $databname);
if(!$conn) die("Connection failed: " . mysqli_connect_error());
echo "Connected succesful<br>";

$sql = "INSERT INTO $tablename 
(nombre, apellidos, telefono, publicidad, peluquero, ultima, correo) 
VALUES ('Manuel', 'Gutiérrez', '+3466666666', 1, 'Carolina', '', 'email@email.com')";

if($conn->query($sql) == true) echo "Inserción correcta en la tabla $tablename<br>";
else echo "Error: ".$conn->error."<br>";

$sql="SELECT * from $tablename where id=5";
$sql = "SELECT * from $tablename where nocampo=5";
try{
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        $sql = "DELETE from $tablename where id=17";
        if($conn->query($sql)===TRUE) echo "<br>Cliente 17 eliminado.<br>";
        else echo "<br> Error en la eliminación: $conn->error.<br>";
    }
    else echo "<br> Cliente 5 no encontrado.<br>";
}catch (Exception $e){
    echo "<br> Error en la consulta.";
}

$sql = "UPDATE $tablename set nombre='Pepe' where id=16";
if($conn->query($sql)===TRUE) echo "<br>ID. 16 actualizado.<br>";
else echo "<br$conn->error<br>";

$sql = "SELECT * FROM $tablename WHERE publicidad=1 order by id desc";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        echo "id: ".$row["id"].
        ", nombre: ".$row["nombre"].
        ", apellidos: ".$row["apellidos"].
        ", teléfono: ".$row["telefono"].
        ", publicidad: ".$row["publicidad"].
        ", peluquero: ".$row["peluquero"].
        ", última sesión: ".$row["ultima"].
        ", correo: ".$row["correo"]."<br>";
    }
} else echo "Sin resultado";


?>
