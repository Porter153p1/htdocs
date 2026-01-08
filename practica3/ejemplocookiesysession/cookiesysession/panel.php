<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

if(!isset($_COOKIE['usuario'])) {
    unset($_SESSION['usuario']);
    header("Location: login.php");
    exit;
}
setcookie("usuario", $_SESSION['usuario'], time() + (5), "/");
?>

<h1>Bienvenido, <?php echo $_SESSION['usuario']; ?></h1>

<p>Esta página solo se ve si has iniciado sesión.</p>

<a href="logout.php">Cerrar sesión</a>
