<?php
$HOST = "187.33.149.48";
$USER = "adminweb";
$PASS = "Alumn2526!";
$DB   = "testmysql";

// conectar
$conn = new mysqli($HOST, $USER, $PASS, $DB);

// Comprobar y cambiar por try catch
if ($conn->connect_errno) {
    die("Error al conectar: " . $conn->connect_error);
} else echo "Conexión correcta a testmysql<br>";

?>
