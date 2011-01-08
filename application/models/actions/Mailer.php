<?php
function mailto($email,$who,$subject,$body)
{
	require_once(realpath('./').'/library/Mailer/class.phpmailer.php');
	
	$mail = new PHPMailer();
	$address = $email;
	$mail->IsSMTP(); 
	$mail->Host = "mail.sohu.com"; 
	$mail->SMTPAuth = true; 
	$mail->Username = "taptap@sohu.com"; 
	$mail->Password = "asdf1234"; 
	$mail->From = "taptap@sohu.com"; 
	$mail->FromName = "Knock-Cool-Image";
	$mail->AddAddress("$address", "".$who."");
	$mail->Subject = "".$subject."";
	$mail->Body = "".$body.""; 
	$mail->AltBody = "Welcome to Knock-Cool-Image!";
	return $mail->send();
}
?>