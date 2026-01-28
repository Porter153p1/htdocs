<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../core/Session.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../controllers/AuthController.php';

Session::start();

if ($_POST) {
    if (AuthController::login($_POST['email'], $_POST['password'])) {
        header("Location: profile.php");
        exit;
    }
    echo "Login incorrecto o cuenta no activada";
}
?>

<form method="post">
    <input type="email" name="email" required>
    <input type="password" name="password" required>
    <button>Entrar</button>
</form>