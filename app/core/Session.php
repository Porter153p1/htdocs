<?php
class Session {
    public static function start() {
        session_start();
        if (isset($_SESSION['LAST_ACTIVITY']) &&
            time() - $_SESSION['LAST_ACTIVITY'] > SESSION_TIMEOUT) {
            session_unset();
            session_destroy();
        }
        $_SESSION['LAST_ACTIVITY'] = time();
    }
}