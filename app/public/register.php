<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../core/Mailer.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Action.php';
require_once __DIR__ . '/../controllers/AuthController.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    AuthController::register($_POST);
    $mensaje = "Registro correcto. Revisa tu email para activar la cuenta.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>

<h2>Registro</h2>

<?php if ($mensaje): ?>
    <p><?= $mensaje ?></p>
<?php endif; ?>

<form method="post">
    <input type="text" name="username" placeholder="Usuario" required><br><br>
    <input type="text" name="nombre" placeholder="Nombre" required><br><br>
    <input type="text" name="apellidos" placeholder="Apellidos" required><br><br>

    <select name="genero" required>
        <option value="">Género</option>
        <option value="M">M</option>
        <option value="F">F</option>
        <option value="O">O</option>
    </select><br><br>

    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Contraseña" required><br><br>

    <button type="submit">Registrar</button>
</form>

<p><a href="login.php">Ir a login</a></p>

</body>
</html>