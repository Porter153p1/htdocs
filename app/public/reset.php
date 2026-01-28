<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Action.php';
require_once __DIR__ . '/../core/Mailer.php';

$user = User::findByEmail($_POST['email']);
if ($user) {
    $token = Action::create($user['id'], 'reset');
    Mailer::send($user['email'], 'Reset password',
        BASE_URL."confirm.php?token=$token&type=reset");
}