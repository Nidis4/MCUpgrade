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
$appointment->id = isset($_GET['id']) ? $_GET['id'] : die();


//echo $appointment->id;
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
$stmt = $appointment->cancelAppointment($cancelReason, $cancelComment);
 
$appointment_arr=array(
    "ResultCode" => $stmt
);
     
 
echo json_encode($appointment_arr);
?>