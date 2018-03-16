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


$cancelReason = 2;


if(@$_POST['cancelComment']){
	$cancelComment = $_POST['cancelComment'];
}else{
	$cancelComment = "Rejected";
}

// create array
$stmt = $appointment->readOne();

$stmt1 = $appointment->cancelAppointment($cancelReason, $cancelComment);

$cust_id = $appointment->cust_member_id;
$application_id = $appointment->application_id;
$county_id =  $appointment->county_id;
$date =  $appointment->date;
$time =  $appointment->time;
$address =  $appointment->address;
$budget =  $appointment->budget;
$commision =  $appointment->commision;
$agent_id =  $appointment->agent_id;
$comment =  $appointment->comment;
$status =  $appointment->status;

$prof_id = $appointment->prof_member_id;

$addressEn = urlencode($address);
$availProfessionals = file_get_contents($home_url.'professional/getProfAfterReject.php?county_id='.$county_id.'&application_id='.$application_id.'&date='.$date.'&time='.$time.'&address='.$addressEn);
$availProfessional = json_decode($availProfessionals, true);

$prof_new_id = $availProfessional['prof_id'];
 
$appointment_arr=array(
	"previous_prof" => $prof_id,
	"next_prof" => $availProfessional['prof_id']
);

if ($status!=0){
	$appointment->create($prof_new_id, $cust_id, $application_id, $county_id, $date, $time, $address, $budget, $commision, $agent_id, $comment, $status);
} 
 
echo json_encode($appointment_arr);
?>