<?php
require_once("conexion-remota.php");

$alumno_="tunombre";

$tabla = "tabla_" . strtolower($alumno_); 
// o cambiarlo manualmente

$sql = "CREATE TABLE IF NOT EXISTS $tabla (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    edad INT
)";

if ($conn->query($sql)) {
    echo "Tabla $tabla creada correctamente.";
} else {
    echo "Error: " . $conn->error;
}
?>
