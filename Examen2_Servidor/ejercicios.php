<?php
require "conexion.php";

#Ejercicio 2
// Guardando la creación de la tabla en la variable $sql
$sql = "CREATE TABLE IF NOT EXISTS Realizador (
    Nombre VARCHAR(80),
    Apellidos VARCHAR(120),
    DNI VARCHAR(12) UNIQUE
)";

//Creando la tabla
$conn->query($sql);

// Guardando los datos en variables para mayor comodidad
$nombre = "Raul";
$apellidos = "Guerra Postigo";
$dni = "12345678A";

//Insertando los datos
$sql = "INSERT INTO Realizador (Nombre, Apellidos, DNI)
        VALUES (?, ?, ?)";

//Insertando los valores
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nombre, $apellidos, $dni);

#Ejercicio 3
//La consulta
$sql= "show tables";

$result = $conn->query($sql);

//Mostrando las tablas
echo "<h2>Mostrando las tablas</h2>";
while ($row = $result->fetch_array()) {
    echo $row[0] . "<br>";
}
echo "<br>";

#Ejercicio 4
//La consulta que voy ha hacer para sacar todos los datos
$sql = "SELECT * FROM alumnos";
$result = $conn->query($sql);

echo "<h2>Listado de alumnos: </h2>";

//Mostrando los datos
while ($row = $result->fetch_assoc()) {
    echo "<table>";
    foreach ($row as $campo => $valor) {
        echo "<tr><td><b>$campo:</b></td> <td>$valor</td></tr> ";
    }
    echo "</table> <br>";
}
//No es bonito pero muestra como esta formada la tabla
var_dump($result);

#Ejercicio 5
//No le meto ni el id ni cuando se ha creado porque son valores que se autoasignan
$sql = "INSERT INTO alumnos (nombre, apellidos, email, fecha_nacimiento)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssis", $nombre, $apellidos, $email, $fecha);

//Datos ha insertar
$nombre = "Carlos";
$apellidos = "López Díaz";
$email = "a@a.com";
$fecha = "2001-05-30";

//Comprobando errores
if ($stmt->execute()) {
    echo "Alumno insertado correctamente";
} else {
    echo "Error: " . $conn->error;
}
