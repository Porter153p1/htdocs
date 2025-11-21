<?php
// db.php — conexión y tabla mínima

$HOST = "localhost";
$USER = "root";
$PASS = "";
$DB   = "practicaclases";

// conectar con mysql
$conn = new mysqli($HOST, $USER, $PASS);

// crear base de datos si no existe
$conn->query("CREATE DATABASE IF NOT EXISTS `$DB` CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci");

// reconectar a la BD
$conn = new mysqli($HOST, $USER, $PASS, $DB);
$conn->set_charset("utf8mb4");

// creando tabla de clientes
$sql = "CREATE TABLE IF NOT EXISTS clientes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  apellidos VARCHAR(120) NOT NULL,
  nombre VARCHAR(80) NOT NULL,
  fecha_nacimiento DATE NOT NULL,
  ultima_visita DATE NULL,
  telefono VARCHAR(20) NULL,
  direccion VARCHAR(200) NULL,
  peluquero_confianza VARCHAR(100) NULL
) ENGINE=InnoDB";
$conn->query($sql);

// creando tabla de peluqueros
$sql = "CREATE TABLE IF NOT EXISTS peluqueros (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(120) NOT NULL
) ENGINE=InnoDB";
$conn->query($sql);
?>
