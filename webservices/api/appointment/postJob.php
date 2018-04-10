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

$id = isset($_POST['id']) ? $_POST['id'] : die();
$close_times = isset($_POST['close_times']) ? $_POST['close_times'] : die();

$stmt = $appointment->updateCloseTimes($id, $close_times);

if($stmt){ 
    echo json_encode(
        array("message" => "Update Completed.")
    );
}
 
else{
    echo json_encode(
        array("message" => "No Update Made.")
    );
}
?>