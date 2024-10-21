<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth=true;
$mail->Username='shaikhsohail1131@gmail.com';
$mail->Password='txkh frjc oejv ltcr';
$mail->SMTPSecure='ssl';
$mail->Port = 465;
$mail->setFrom('shaikhsohail1131@gmail.com'); // <-- Corrected method name
$mail->addAddress('shaikhsohail078607860786@gmail.com');
$mail->isHTML(true);
$mail->Subject = "today is good"; // <-- Corrected variable name
$mail->Body = 'hello, my name is sohail';
$mail->send();
echo "email send";
?>
