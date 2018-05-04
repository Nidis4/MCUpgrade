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

$payment->readOne();




// // create curl resource 
// $ch = curl_init(); 

// // set url 
// curl_setopt($ch, CURLOPT_URL, "http://localhost/MCUpgrade/webservices/api/payment/invoice_receipt_pdf.php?payment_id=1725"); 

// //return the transfer as a string 
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

// // $output contains the output string 
// $output = curl_exec($ch); 

// // close curl resource to free up system resources 
// curl_close($ch);


$name = $payment->first_name." ".$payment->last_name;




//$body = file_get_contents("../../../emails/header.php");
$body = file_get_contents("../../../emails/send_invoice.php");
//$body .= file_get_contents("../../../emails/footer.php");
$message = str_replace('{{URL}}', SITE_URL, $body );
$message = str_replace('{{NAME}}', $name, $message );

$to = $payment->receipt_email;
$to = "er.hpreetsingh@gmail.com";
$subject = "Invoice from myConstructor";
// Always set content-type when sending HTML email

$filenamepdf = "invoice-".$_GET['id'].".pdf";

//$path = "save.php";
$path = SITE_URL."webservices/api/payment/invoice_receipt_pdf.php?type=i&filename=".$filenamepdf."&payment_id=".$_GET['id'];

$ch = curl_init($path);

 curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
 curl_setopt($ch, CURLOPT_HEADER, TRUE);
 curl_setopt($ch, CURLOPT_NOBODY, TRUE);

 $data = curl_exec($ch);
 //$file_size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);

curl_close($ch);


$separator = md5( time() );
// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;



// main header (multipart mandatory)
$from_mail = "logistirio@myconstructor.gr";
$from_name = "Myconstructor";

$file = $filenamepdf;

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
$nmessage .= "Content-type:text/html; charset=iso-8859-1\r\n";
$nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$nmessage .= $message."\r\n\r\n";
$nmessage .= "--".$uid."\r\n";
$nmessage .= "Content-Type: application/octet-stream; name=\"".$filenamepdf."\"\r\n"; 
$nmessage .= "Content-Transfer-Encoding: base64\r\n";
$nmessage .= "Content-Disposition: attachment; filename=\"".$filenamepdf."\"\r\n\r\n";
$nmessage .= $content."\r\n\r\n";
$nmessage .= "--".$uid."--";


//error_reporting(E_ALL);


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
	
    echo json_encode(
        array("message" => error_get_last()['message'])
    );
}
?>