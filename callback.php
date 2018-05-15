<?php
if($_POST){

	$name = $_POST['name'];

	$mobile = $_POST['mobile']; 

	$time = $_POST['time']; 

	$url=$_POST['url'];
	if($name !='' && $mobile !='' && $time !='' && $url !='') {
		$mess = "Αίτημα επικοινωνίας \n \n Στοιχεία επικοινωνίας \n\n Όνομα: $name \n\n Τηλέφωνο: $mobile \n\n Ώρα επικοινωνίας: $time \n\n Το αίτημα στάλθηκε από την σελίδα: $url" ;

		$to = "mcr.chatzopoulou@gmail.com";
		$subject= "Call Back ". $name . ' '. $mobile;
		$headerFields = array('MIME-Version: 1.0', 'Content-Type: text/plain;charset=utf-8');

		$mail_sent = @mail( $to, $subject, $mess,implode("\r\n", $headerFields));
		echo $name . $mobile . $time . $to; 
	}
	else{
		echo "lathos";
	} 
}else{
	echo "lathos";
}      

?>