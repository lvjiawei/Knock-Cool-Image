<?php
function send_mail($to){
	include(realpath("./")."/lib/ext/class.phpmailer.php");
	$mail = new PHPMailer();
	$address = $to['email'];
	$mail->IsSMTP(); 
	$mail->Host = "mail.sohu.com"; 
	$mail->SMTPAuth = true; 
	$mail->Username = "taptap@sohu.com"; 
	$mail->Password = "asdf1234"; 
	$mail->From = "taptap@sohu.com"; 
	$mail->FromName = "Knock-Cool-Image";
	$mail->AddAddress("$address", "".$to['nickname']."");
	//$mail->AddReplyTo("", "");
	//$mail->AddAttachment("/var/tmp/file.tar.gz");
	//$mail->IsHTML(true); 
	$mail->Subject = "".$to['subject']."";
	$mail->Body = "".$to['body'].""; 
	$mail->AltBody = "Welcome to Knock-Cool-Image!";
	return $mail->send();
}
?>