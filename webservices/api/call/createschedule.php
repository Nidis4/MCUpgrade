<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/call.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$call = new Call($db);
 

$calltime = isset($_POST['calltime']) ? $_POST['calltime'] : die();
$Customersmobile = isset($_POST['Customersmobile']) ? $_POST['Customersmobile'] : die();
$agent_id = isset($_POST['agent_id']) ? $_POST['agent_id'] : die();

$date = date("Y-m-d");
$calldatetime = $date.' '.$calltime.':00';


// query products
$stmt = $call->createschedule($calldatetime, $Customersmobile, $agent_id);
//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if($stmt){ 
    

   

    echo $stmt;
}
 
else{
    echo json_encode(
        array("message" => "No Call found.")
    );
}
?>