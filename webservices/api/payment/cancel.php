<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/payment.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$payment = new Payment($db);

// set ID property of product to be edited
$payment->id = isset($_GET['id']) ? $_GET['id'] : die();


//echo $payment->id;
if(@$_POST['cancelReason']){
	$cancelReason = $_POST['cancelReason'];
}else{
	$cancelReason = 0;
}

if(@$_POST['cancelComment']){
	$cancelComment = $_POST['cancelComment'];
}else{
	$cancelComment = "";
}

// create array
$stmt = $payment->cancelpayment($cancelReason, $cancelComment);
 
$payment_arr=array(
    "ResultCode" => $stmt
);
     
 
echo json_encode($payment_arr);
?>