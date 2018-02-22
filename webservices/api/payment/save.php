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

$professional_id = $_POST['professional_id'];
$category_id     = $_POST['category_id'];
$amount          = $_POST['amount'];
$agent_id        = $_POST['agent_id'];
$comment         = $_POST['comment'];
$type            = $_POST['type'];
$bank_name       = $_POST['bank_name'];

$datetime_added  = $Pdatetimeadded;
$issuetype       = $_POST['issuetype'];


// query products
$stmt = $payment->save($professional_id, $category_id, $amount, $agent_id, $comment, $type, $bank_name, $datetime_added, $issuetype);
//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if($stmt){
 
    echo json_encode(
        array("message" => "Payment added successfully.")
    );
}
 
else{
    echo json_encode(
        array("message" => "Please try again.")
    );
}
?>