<?php
require_once __DIR__ . '/../models/User.php';

class ProfileController {

    public static function update($userId, $data) {
        User::updateProfile($userId, $data);
    }

    public static function uploadPhoto($userId, $file) {
        if ($file['error'] !== UPLOAD_ERR_OK) return;

        $name = bin2hex(random_bytes(20)) . '.png';
        $path = __DIR__ . '/../pics/profile/' . $name;

        move_uploaded_file($file['tmp_name'], $path);
        User::updatePhoto($userId, $name);
    }
}