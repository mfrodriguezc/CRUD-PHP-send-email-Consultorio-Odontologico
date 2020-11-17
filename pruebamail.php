<?php

include_once 'PHPMailer-master/src/PHPMailer.php';
include_once 'PHPMailer-master/src/SMTP.php';

$mail=new PHPMailer();
$mail->CharSet = 'UTF-8';

$body = 'Cuerpo del correo de prueba';

$mail->IsSMTP();
$mail->Host       = 'smtp.live.com';
$mail->SMTPSecure = 'tls';
$mail->Port       = 587;
$mail->SMTPDebug  = 1;
$mail->SMTPAuth   = true;
$mail->Username   = 'asdas@|asdas.com';
$mail->Password   = 'CLAVECORREO';
$mail->SetFrom('sigeodont@hotmail.com', "SIGEODONT");
$mail->AddReplyTo('no-reply@mycomp.com','no-reply');
$mail->Subject    = 'Correo de prueba PHPMailer : TITULO';
$mail->MsgHTML($body);

$mail->AddAddress('higiv12562@reptech.org', 'NOMBRE DE QUIEN LO RESIVE');
$mail->send();

