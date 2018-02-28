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

$return = array();

if(isset($_REQUEST['id']) && isset($_REQUEST['type']) && isset($_REQUEST['member_id'])){

	$appointment->id = $_REQUEST['id'];
	$type = $_REQUEST['type'];
	$prof_member_id = $_REQUEST['member_id'];
	include_once '../objects/professional.php';
	$stmt = $appointment->readOne();
	$professional = new Professional($db);

	// set ID property of product to be edited
	$professional->id = $_REQUEST['member_id'];
	$professionalstmt = $professional->readOne();

	echo $professional->county_id;
	die;

	//$stmt = $appointment->rejectByProf($appointment_id, $prof_member_id);


}else{
	$return['status'] = "0";
	$return['msg'] = "Please enter parameter";
}

echo json_encode($return);



?>