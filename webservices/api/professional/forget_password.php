<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/professional.php';
include_once '../../../constants.php';
 
// instantiate database and admin object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$professional = new Professional($db);
$professional->email = isset($_POST['email']) ? $_POST['email'] : die();

// query Admins
$stmt = $professional->forgetPassword();
 
// check if more than 0 record found
if($stmt){
    
    $body = file_get_contents("../../../emails/header.php");
    $body .= file_get_contents("../../../emails/reset_password.php");
    $body .= file_get_contents("../../../emails/footer.php");
    $message = str_replace('{{URL}}', SITE_URL, $body );
    $message = str_replace('{{KEY}}', $stmt['key'], $message );
    
    $to = "er.hpreetsingh@gmail.com";
    $subject = "Reset Password - MyConstructor";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    //$headers .= 'From: <webmaster@example.com>' . "\r\n";
    //$headers .= 'Cc: myboss@example.com' . "\r\n";
    //echo $message;

    mail($to,$subject,$message,$headers); 

    echo json_encode(
        array("ResultCode" => "1",'message' => 'Please check your email to reset password!')
    );
 
    
}
 
else{
    echo json_encode(
        array("ResultCode" => "0",'message' => 'Email address does not exist!')
    );
}
?>