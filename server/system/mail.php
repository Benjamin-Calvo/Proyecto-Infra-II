<?php
require 'mailer/PHPMailerAutoload.php';
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$usuario = $_POST["usuario"];
$content = $_POST["content"];
$to = $_POST["to"];
$mail             = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.yourdomain.com"; // SMTP server
$mail->CharSet = 'UTF-8';
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.live.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "victorvr94@hotmail.com";  // GMAIL username
$mail->Password   = "homerojsimpson";            // GMAIL password

$mail->SetFrom('vargasvr94@gmail.com'); //Es el nombre del 

$mail->Subject    = "Proyecto Infraestructura Tecnológica";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML("<h1>Datos de usuario</h1><ul><li>Nombre: $nombre</li><li>Apellidos: $apellidos</li><li>Usuario: $usuario</li></ul><p>$content</p>");

$mail->AddAddress($to); // ciclo para enviarlo a varios

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  header("Location: inicio.php");
}
    