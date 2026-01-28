<?php
require_once __DIR__ . '/../core/Database.php';

class Action {

    public static function create($userId, $type) {
        $token = bin2hex(random_bytes(32));
        $db = Database::connect();

        $stmt = $db->prepare(
            "INSERT INTO actions (userid, token, action_type, requested_at)
             VALUES (?,?,?,NOW())"
        );
        $stmt->execute([$userId, $token, $type]);

        return $token;
    }

    public static function getValid($token, $type) {
        $db = Database::connect();
        $stmt = $db->prepare(
            "SELECT * FROM actions 
             WHERE token=? AND action_type=? AND executed_at IS NULL"
        );
        $stmt->execute([$token, $type]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function execute($id) {
        $db = Database::connect();
        $db->prepare(
            "UPDATE actions SET executed_at = NOW() WHERE id = ?"
        )->execute([$id]);
    }
}