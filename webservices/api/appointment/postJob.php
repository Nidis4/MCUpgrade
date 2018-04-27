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

$id = isset($_POST['id']) ? $_POST['id'] : fail();
$close_times = isset($_POST['close_times']) ? $_POST['close_times'] : fail();

$stmt = $appointment->updateCloseTimes($id, $close_times);

if($stmt){ 
    echo json_encode(
        array("status" => "1")
    );
}
 
else{
    echo json_encode(
        array("status" => "0")
    );
}

function fail(){
	echo json_encode(
        array(
        	"status" => "0",
        	"error" => "missing arguments"
        )
    );
    die();
}
?>