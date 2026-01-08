<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("Location: panel.php");
    exit;
}

// Si existe cookie, autologin:
if (isset($_COOKIE['usuario'])) {
    $_SESSION['usuario'] = $_COOKIE['usuario'];
    header("Location: panel.php");
    exit;
}
?>

<form action="procesa_login.php" method="POST">
    <label>Usuario:</label>
    <input type="text" name="usuario" required>

    <label>Contraseña:</label>
    <input type="password" name="clave" required>

    <label>
        <input type="checkbox" name="recordar"> Recordarme
    </label>

    <button type="submit">Entrar</button>
</form>
