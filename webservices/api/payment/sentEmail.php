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
$attachment = chunk_split( base64_encode($content));
$separator = md5( time() );
// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;



// main header (multipart mandatory)
$from_mail = "logistirio@myconstructor.gr";
$from_name = "Myconstructor";

$file = $path;
$file_size = filesize($file);
$handle = fopen($file, "r");
$content = fread($handle, $file_size);
fclose($handle);
$content = chunk_split(base64_encode($content));
$uid = md5(uniqid(time()));
$name = basename($file);
$header = "From: ".$from_name." <".$from_mail.">\r\n";
$header .= "Reply-To: ".$replyto."\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

$nmessage = "--".$uid."\r\n";
$nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
$nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$nmessage .= $message."\r\n\r\n";
$nmessage .= "--".$uid."\r\n";
$nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; 
$nmessage .= "Content-Transfer-Encoding: base64\r\n";
$nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
$nmessage .= $content."\r\n\r\n";
$nmessage .= "--".$uid."--";


error_reporting(E_ALL);


// More headers
//$headers .= 'From: <logistirio@myconstructor.gr>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";





// query products

//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if(mail( $to, $subject,  $nmessage,  $header )){
 	$stmt = $payment->sentEmail();
    echo json_encode(
        array("message" => "Email sent successfully.")
    );
}
 
else{
	print_r(error_get_last());
    die;
    echo json_encode(
        array("message" => error_get_last())
    );
}
?>