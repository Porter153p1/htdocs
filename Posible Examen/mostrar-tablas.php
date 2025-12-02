<?php
require_once("conexion-remota.php");

$result = $conn->query("SHOW TABLES");

echo "<h3>Tablas existentes en testmysql:</h3>";
while ($fila = $result->fetch_array()) {
    echo $fila[0] . "<br>";
}
?>
