<?php
require_once("conexion-remota.php");

$tabla = "alumnos";

$sql = "UPDATE $tabla SET edad = 30 WHERE nombre = ‘Ana Torres’";

if ($conn->query($sql)) {
    echo "Registro modificado.";
} else {
    echo "Error: " . $conn->error;
}
?>
