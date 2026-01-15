<?php
// CONEXIÓN A LA BD
$host = "localhost";
$db   = "acciones";
$user = "root";
$pass = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Error de conexión");
}

// HTML
echo "<!DOCTYPE html>";
echo "<html lang='es'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<title>Reset Password</title>";
echo "</head>";
echo "<body>";

echo "<h1>Reinicio de contraseña</h1>";

// CASO 1: SIN PARÁMETRO action
if (!isset($_GET['action'])) {

    // Generar hash
    $hash = bin2hex(random_bytes(32));

    // Insertar en tabla
    $stmt = $pdo->prepare("
        INSERT INTO acciones (usuario, hash, action, time, flag)
        VALUES (1, ?, 'resetpassword', NOW(), 0)
    ");
    $stmt->execute([$hash]);

    // ENLACE CORRECTO (ruta relativa)
    $link = "resetpassword.php?action=$hash";

    echo "<p>Se ha enviado un correo con el enlace de verificación.</p>";
    echo "<p><strong>(Simulación)</strong></p>";
    echo "<p><a href='$link'>$link</a></p>";
    echo "<p><a href='login.php'>⬅ Volver al login</a></p>";

// CASO 2: CON PARÁMETRO action
} else {

    $hash = $_GET['action'];

    // Buscar acción
    $stmt = $pdo->prepare("
        SELECT * FROM acciones WHERE hash = ?
    ");
    $stmt->execute([$hash]);
    $accion = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$accion) {
        echo "<p>Enlace no válido.</p>";
        echo "</body></html>";
        exit;
    }

    if ($accion['flag'] == 1) {
        echo "<p>Esta acción ya ha sido ejecutada.</p>";
        echo "</body></html>";
        exit;
    }

    // Marcar como ejecutada
    $stmt = $pdo->prepare("
        UPDATE acciones SET flag = 1 WHERE hash = ?
    ");
    $stmt->execute([$hash]);

    echo "<p>Enlace válido.</p>";
    echo "<p>La acción de reinicio de contraseña ha sido verificada correctamente.</p>";
}

echo "</body>";
echo "</html>";
