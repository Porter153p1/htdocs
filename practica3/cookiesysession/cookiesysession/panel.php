<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>

<h1>Bienvenido, <?php echo $_SESSION['usuario']; ?></h1>

<p>Esta página solo se ve si has iniciado sesión.</p>

<a href="logout.php">Cerrar sesión</a>
