<?php
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // CONFIGURACIÓN SMTP
    ROMPIENDO EL CÓDIGO
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'porter153.p1@gmail.com';
    $mail->Password = 'gkxv zriu mmly hoor';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // REMITENTE Y DESTINO
    $mail->setFrom('porter153.p1@gmail.com', 'Prueba PHP'); //correo desde donde se envia
    $mail->addAddress('porter153.p1@gmail.com'); //correo de destino

    // CONTENIDO
    $mail->isHTML(false);
    $mail->Subject = 'Correo de prueba';
    $mail->Body = 'Este correo ha sido enviado con PHP';

    // ENVIAR
    $mail->send();
    echo 'Correo enviado correctamente';

} catch (Exception $e) {
    echo 'Error: ' . $mail->ErrorInfo;
}
