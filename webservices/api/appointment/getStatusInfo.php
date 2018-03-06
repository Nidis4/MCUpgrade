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
include_once '../objects/appointment.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$appointment = new Appointment($db);

// set ID property of product to be edited
$appointment->status = isset($_GET['id']) ? $_GET['id'] : die();


//echo $appointment->id;

// create array
$stmt = $appointment->getStatusInfo();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $toStatus = getToStatus($row['TO_STATUS'], $appointment);
 
        $status_arr=array(
            "id" => $row['ID'],
            "name" => $row['NAME'],
            "to_status" => $toStatus
        );
     
 
    echo json_encode($status_arr);
}

function getToStatus($status, $appointment){
    $statuses = array();

    $arr = explode(':', $status);
    foreach ($arr as $val){
        $name = $appointment->getStatusName($val);
        $status_item = array(
            "name" => $name,
            "id" => $val
            //"distance" => $url
        );
    array_push($statuses, $status_item);
    }

    

    return $statuses;
}
?>