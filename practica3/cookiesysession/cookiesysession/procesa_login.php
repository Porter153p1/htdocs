<?php
session_start();

// Usuario de ejemplo
$usuarioCorrecto = "admin";
$claveCorrecta = "1234";

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

// Comprobación sencilla
if ($usuario === $usuarioCorrecto && $clave === $claveCorrecta) {
    // Guardamos en sesión
    $_SESSION['usuario'] = $usuario;

    // Si marcaron Recordarme → crear cookie por 7 días
    if (isset($_POST['recordar'])) {
        setcookie("usuario", $usuario, time() + (7 * 24 * 60 * 60), "/");
    }

    header("Location: panel.php");
} else {
    echo "Credenciales incorrectas.";
    echo "<br><a href='login.php'>Volver</a>";
}
