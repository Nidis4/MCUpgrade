<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/payment.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

date_default_timezone_set('Europe/Athens');
$Pdatetimeadded = date("Y-m-d H:i:s");

// initialize object
$payment = new Payment($db);

$amount          = $_POST['amount'];
$description         = $_POST['description'];
$datetime_added  = $Pdatetimeadded;
$id       		 = $_POST['id'];


// query products
$stmt = $payment->updatePayment($id, $amount, $description, $datetime_added);
//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if($stmt){
 
    echo json_encode(
        array("message" => "Updated successfully.")
    );
}
 
else{
    echo json_encode(
        array("message" => "Please try again.")
    );
}
?>