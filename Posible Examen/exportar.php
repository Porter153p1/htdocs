<?php
// NO ES LA FORMA MÁS EFICIENTE, pero sí es "sencilla"
// Sería más eficiente:
// mysqldump -h ORIGEN -u user -p DB tabla | mysql -h DESTINO -u user -p DB

$conn1 = new mysqli("187.33.149.48", "adminweb", "Alumn2526!", "testmysql");
$conn2 = new mysqli("IP_DESTINO", "user", "password", "testmysql");

// Leer los datos del origen
$result = $conn1->query("SELECT * FROM alumnos");

while ($row = $result->fetch_assoc()) {
    $nombre = $conn2->real_escape_string($row['nombre']);
    $edad  = $conn2->real_escape_string($row['edad']);
    $email  = $conn2->real_escape_string($row['email']);
    $curso  = $conn2->real_escape_string($row['curso']);
    $nota   = $conn2->real_escape_string($row['nota']);

    $conn2->query("
        INSERT INTO alumnos (nombre, email, curso, nota)
        VALUES ('$nombre', '$email', '$curso', '$nota')
    ");
}

echo "Tabla exportada al servidor destino.";
?>
