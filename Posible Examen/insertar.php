<?php
require_once("conexion-remota.php");

$tabla = "alumnos"; 

$sql = "INSERT INTO $tabla (nombre, edad) VALUES
('Juan', 20),
('Laura', 22),
('Miguel', 19)
";

if ($conn->query($sql)) {
    echo "Datos insertados correctamente.";
} else {
    echo "Error: " . $conn->error;
}
?>
