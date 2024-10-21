<?php
$_SESSION['showAlert'] = 1;
	require 'config.php';
	$_SESSION['id'] = $_GET['id'];
	$id = $_SESSION['id'];


	$sql = "UPDATE clinic SET approval = 1 where id=$id";

	$result = mysqli_query($conn,$sql);
	$sql1 = "SELECT * FROM clinic Where id= $id";
	$result1 = mysqli_query($conn,$sql1);
	$row = mysqli_fetch_array($result1); 

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
$mail->addAddress($row['email']);
$mail->isHTML(true);
$mail->Subject = "Congratulation"; // <-- Corrected variable name
$mail->Body = 'Your clinic Account has benn Approved by Klinic Web Application <br>Thank You Stay Connected With Us <img src="C:\xampp\htdocs\myproject\admin\img.jpg" height=200 width=200>';
$mail->send();
echo "email send";


	if($result)
	{
		$_SESSION['showAlert'] = 1;
		header("location:clinic_approve.php");
	}

?>