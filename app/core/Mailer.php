<?php
class Mailer {
    public static function send($to, $subject, $link) {
        $headers = "From: no-reply@app.com";
        mail($to, $subject, "Pulsa aquí: $link", $headers);
    }
}