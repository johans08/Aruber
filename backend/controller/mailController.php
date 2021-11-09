<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../lib/PHPMailer/Exception.php';
require '../lib/PHPMailer/PHPMailer.php';
require '../lib/PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

$correo = $_POST['correo'];
$nombre = $_POST['nombre'];
$mensaje = $_POST['mensaje'];

try {

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();

    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'aruberviajeseguro@gmail.com';
   	$mail->Password   = 'mauro232';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients

    $mail->setFrom('aruberviajeseguro@gmail.com', 'Aruber'); // De
    $mail->addAddress('aruberviajeseguro@gmail.com', 'Aruber'); // Para
    $mail->addAddress($correo, $nombre); // Para

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Nuevo mensaje desde formulario';
    $mail->Body    = 'Ha recibido un nuevo mensaje desde el formulario de contacto <br>';
    $mail->Body    .= "<b>Nombre: </b> {$nombre} <br>";
    $mail->Body    .= "<b>Correo: </b> {$correo} <br>";
    $mail->Body    .= "<b>Mensaje: </b> {$mensaje}";

    $mail->send();

    echo 1;
} catch (Exception $e) {
    echo 0;
}




