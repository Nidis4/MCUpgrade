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


$path = "save.php";
$file = fopen( $path, "r" );
# Read the file into a variable
$size = filesize($path);
$content = fread( $file, $size);
$encoded_content = chunk_split( base64_encode($content));
$num = md5( time() );


# Define the main headers.
$header  = "From:logistirio@myconstructor.gr\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; ";
$header .= "boundary=$num\r\n";
$header .= "--$num\r\n";

 # Define the message section
$header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$header .= "Content-Transfer-Encoding:8bit\r\n\n";
$header .= "$message\r\n";
$header .= "--$num\r\n";


# Define the attachment section
$header .= "Content-Type:  multipart/mixed; ";
$header .= "name=\"save.php\"\r\n";
$header .= "Content-Transfer-Encoding:base64\r\n";
$header .= "Content-Disposition:attachment; ";
$header .= "filename=\"save.php\"\r\n\n";
$header .= "$encoded_content\r\n";
$header .= "--$num--";



// More headers
//$headers .= 'From: <logistirio@myconstructor.gr>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";





// query products

//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if(mail( $to, $subject, "", $header )){
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