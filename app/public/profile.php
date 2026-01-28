<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Session.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../controllers/ProfileController.php';

Session::start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = User::findById($_SESSION['user']);

if ($_POST) {
    ProfileController::update($_SESSION['user'], $_POST);
    if (!empty($_FILES['photo']['name'])) {
        ProfileController::uploadPhoto($_SESSION['user'], $_FILES['photo']);
    }
    echo "Perfil actualizado";
}
?>

<form method="post" enctype="multipart/form-data">
    <input name="nombre" value="<?= $user['nombre'] ?>">
    <input name="apellidos" value="<?= $user['apellidos'] ?>">
    <select name="genero">
        <option value="M">M</option>
        <option value="F">F</option>
        <option value="O">O</option>
    </select>
    <input type="file" name="photo">
    <button>Guardar</button>
</form>

<a href="logout.php">Cerrar sesión</a>