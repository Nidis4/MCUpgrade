<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/payment.php';
include_once '../../../constants.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

date_default_timezone_set('Europe/Athens');
$Pdatetimeadded = date("Y-m-d H:i:s");

// initialize object
$payment = new Payment($db);

$payment->payment_id = $_GET['id'];


//$body = file_get_contents("../../../emails/header.php");
$body = file_get_contents("../../../emails/send_invoice.php");
//$body .= file_get_contents("../../../emails/footer.php");
$message = str_replace('{{URL}}', SITE_URL, $body );
//$message = str_replace('{{KEY}}', $stmt['key'], $message );

$to = "er.hpreetsingh@gmail.com";
$subject = "Invoice from myConstructor";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
//$headers .= 'From: <logistirio@myconstructor.gr>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";





// query products

//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if(mail($to,$subject,$message,$headers)){
 	$stmt = $payment->sentEmail();
    echo json_encode(
        array("message" => "Email sent successfully.")
    );
}
 
else{
    echo json_encode(
        array("message" => "Please try again.")
    );
}
?>