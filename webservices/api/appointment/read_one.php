<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/appointment.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$appointment = new Appointment($db);

// set ID property of product to be edited
$appointment->id = isset($_GET['id']) ? $_GET['id'] : die();

// create array
$stmt = $appointment->readOne();
 
        $appointment_arr=array(
            "id" => $id,
            "prof_member_id" => $prof_member_id,
            "cust_member_id" => $cust_member_id,
            "application_id" => $application_id,
            "date" => $date,
            "time" => $time,
            "address" => $address,
            "budget" => $budget,
            "commision" => $commision,
            "agent_id" => $agent_id,
            "comment" => $comment,
            "sms" => $sms,
            "sms_log_id" => $sms_log_id,
            "googleEventId" => $googleEventId,
            "datetimeCreated" => $datetimeCreated,
            "datetimeStatusUpdated" => $datetimeStatusUpdated,
            "sourceAppointmentId" => $sourceAppointmentId,
            "status" => $status,
            "cancelComment" => $cancelComment
        );
     
 
    echo json_encode($appointment_arr);
?>