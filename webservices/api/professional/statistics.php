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
include_once '../objects/professional.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$professional = new Professional($db);

// set ID property of product to be edited
$professional->id = isset($_GET['id']) ? $_GET['id'] : die();


//echo $customer->id;

// create array
$stmt = $professional->statistics();
$statistics = array('cancelled'=>0,'active'=>0,'updated'=>0,'cancelDefault'=>0,'cancelByCustomer'=>0,'cancelByProfessional'=>0,'cancelByMistake'=>0);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    if($row['status'] == 0){
       $statistics['cancelled']  = $row['count'];
    }else if($row['status'] == 1){
       $statistics['active']  = $row['count'];
    }else if($row['status'] == 2){
       $statistics['updated']  = $row['count'];
    }
}

$stmt = $professional->cancelStatus();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    if($row['cancelReason'] == 0){
       $statistics['cancelDefault']  = $row['count'];
    }else if($row['cancelReason'] == 1){
       $statistics['cancelByCustomer']  = $row['count'];
    }else if($row['cancelReason'] == 2){
       $statistics['cancelByProfessional']  = $row['count'];
    }else if($row['cancelReason'] == 3){
       $statistics['cancelByMistake']  = $row['count'];
    }
}

echo json_encode($statistics);

?>