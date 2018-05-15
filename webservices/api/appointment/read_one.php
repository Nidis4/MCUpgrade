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
$stmt = $appointment->readOne();
 
        $appointment_arr=array(
            "id" => $appointment->id,
            "prof_member_id" => $appointment->prof_member_id,
            "cust_member_id" => $appointment->cust_member_id,
            "application_id" => $appointment->application_id,
            "date" => $appointment->date,
            "time" => $appointment->time,
            "address" => $appointment->address,
            "county_id" => $appointment->county_id,
            "delivery_address" => $appointment->delivery_address,
            "budget" => $appointment->budget,
            "commision" => $appointment->commision,
            "agent_id" => $appointment->agent_id,
            "comment" => $appointment->comment,
            "sms" => $appointment->sms,
            "sms_log_id" => $appointment->sms_log_id,
            "datetimeCreated" => $appointment->datetimeCreated,
            "datetimeStatusUpdated" => $appointment->datetimeStatusUpdated,
            "sourceAppointmentId" => $appointment->sourceAppointmentId,
            "status" => $appointment->status,
            "cancelComment" => $appointment->cancelComment,
            "category_id" => $appointment->category_id,
            "customer_first_name" => $appointment->customer_first_name,
            "customer_last_name" => $appointment->customer_last_name,
            "customer_sex" => $appointment->customer_sex,
            "customer_address" => $appointment->customer_address,
            "customer_phone" => $appointment->customer_phone,
            "customer_mobile" => $appointment->customer_mobile,
            "customer_email" => $appointment->customer_email,
            "transport_details"=> $appointment->transport_details,
        );
     
 
    echo json_encode($appointment_arr);
?>