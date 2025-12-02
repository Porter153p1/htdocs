<?php
require_once("conexion-remota.php");

$tabla = "alumnos"; // cambiar cada alumno

$result = $conn->query("SELECT * FROM $tabla");

echo "<h3>Contenido de la tabla:</h3>";

while ($row = $result->fetch_assoc()) {
    echo $row["id"] . " - " . $row["nombre"] . " (" . $row["edad"] . ")<br>";
}
?>
