<?php
session_start();

// Borrar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Borrar la cookie
setcookie("usuario", "", time() - 3600, "/");

echo "Has cerrado sesión.";
echo "<br><a href='login.php'>Volver al login</a>";
