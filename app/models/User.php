<?php
require_once __DIR__ . '/../core/Database.php';

class User {

    public static function create($data) {
        $db = Database::connect();
        $stmt = $db->prepare(
            "INSERT INTO users 
            (username, nombre, apellidos, genero, email, password, activo, photo)
            VALUES (?,?,?,?,?,?,0,NULL)"
        );

        return $stmt->execute([
            $data['username'],
            $data['nombre'],
            $data['apellidos'],
            $data['genero'],
            $data['email'],
            password_hash($data['password'], PASSWORD_BCRYPT)
        ]);
    }

    public static function findByEmail($email) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function findById($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function activate($id) {
        $db = Database::connect();
        $db->prepare("UPDATE users SET activo = 1 WHERE id = ?")->execute([$id]);
    }

    public static function updatePassword($id, $password) {
        $db = Database::connect();
        $db->prepare(
            "UPDATE users SET password = ? WHERE id = ?"
        )->execute([
            password_hash($password, PASSWORD_BCRYPT),
            $id
        ]);
    }

    public static function updateProfile($id, $data) {
        $db = Database::connect();
        $stmt = $db->prepare(
            "UPDATE users SET nombre=?, apellidos=?, genero=? WHERE id=?"
        );
        $stmt->execute([
            $data['nombre'],
            $data['apellidos'],
            $data['genero'],
            $id
        ]);
    }

    public static function updatePhoto($id, $photo) {
        $db = Database::connect();
        $db->prepare(
            "UPDATE users SET photo=? WHERE id=?"
        )->execute([$photo, $id]);
    }
}