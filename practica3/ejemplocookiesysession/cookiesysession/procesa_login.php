<?php
session_start();

// Usuario de ejemplo
$usuarioCorrecto = "admin";
$claveCorrecta = "1234";

if(!isset($_POST['usuario']) or !isset($_POST['clave'])){
  header("Location: login.php");
  exit;
}
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

// Comprobación sencilla
if ($usuario === $usuarioCorrecto && $clave === $claveCorrecta) {
    // Guardamos en sesión
    $_SESSION['usuario'] = $usuario;

    // Si marcaron Recordarme → crear cookie por 7 días
    if (isset($_POST['recordar'])) {
        setcookie("usuario", $usuario, time() + (5), "/");
    }

    header("Location: panel.php");
} else {
    echo "Credenciales incorrectas.";
    echo "<br><a href='login.php'>Volver</a>";
}
