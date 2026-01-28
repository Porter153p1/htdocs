<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Action.php';

$token = $_GET['token'] ?? null;
$type  = $_GET['type'] ?? 'activate';

$action = Action::getValid($token, $type);
if (!$action) die("Token inválido o ya usado");

if ($type === 'activate') {
    User::activate($action['userid']);
    Action::execute($action['id']);
    echo "Cuenta activada correctamente";
}

if ($type === 'reset' && $_POST) {
    if ($_POST['pass1'] === $_POST['pass2']) {
        User::updatePassword($action['userid'], $_POST['pass1']);
        Action::execute($action['id']);
        echo "Contraseña actualizada";
        exit;
    }
    echo "Las contraseñas no coinciden";
}

if ($type === 'reset') {
?>
<form method="post">
    <input type="password" name="pass1" required>
    <input type="password" name="pass2" required>
    <button>Cambiar contraseña</button>
</form>
<?php } ?>