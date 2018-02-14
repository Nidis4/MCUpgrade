<?php
	$body = file_get_contents("header.php");
	$body .= file_get_contents("create_appointment.php");
	$body .= file_get_contents("footer.php");
	$message = str_replace('{{URL}}', 'https://development.myconstructor.gr/app/webroot/emails/', $body );
	
	echo $message;
	
	$to = "chris@fragoulakis.gr";
	$subject = "New Appointment";
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	//$headers .= 'From: <webmaster@example.com>' . "\r\n";
	//$headers .= 'Cc: myboss@example.com' . "\r\n";

	mail($to,$subject,$message,$headers);
	die;
?>