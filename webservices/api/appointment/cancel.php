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

// create array
$stmt = $appointment->cancelAppointment();
 
        $appointment_arr=array(
            "ResultCode" => $stmt
        );
     
 
    echo json_encode($appointment_arr);
?>