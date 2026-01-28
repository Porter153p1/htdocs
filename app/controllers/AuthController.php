<?php
class AuthController {

    public static function register($data) {
        User::create($data);
        $user = User::findByEmail($data['email']);
        $token = Action::create($user['id'], 'activate');
        Mailer::send($data['email'], 'Activar cuenta', BASE_URL."confirm.php?token=$token");
    }

    public static function login($email, $password) {
        $user = User::findByEmail($email);
        if ($user && $user['activo'] == 1 &&
            password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['id'];
            return true;
        }
        return false;
    }
}