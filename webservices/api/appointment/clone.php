<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/appointment.php';
include_once '../objects/category.php';
include_once '../objects/viber.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$appointment = new Appointment($db);
 

$appointment->id = isset($_GET['app_id']) ? $_GET['app_id'] : die();
$stmt = $appointment->readOne();

 $prof_id = $appointment->prof_member_id;
 $status = '1';
 $cust_id = $appointment->cust_member_id;
 $application_id = $appointment->application_id;
 $county_id = $appointment->county_id;
 $date = $appointment->date;
 $time = $appointment->time;
 $address = $appointment->address;
 $delivery_address = $appointment->delivery_address;
 $budget = $appointment->budget;
 $commision = $appointment->commision;
 $agent_id = $appointment->agent_id;
 $comment = $appointment->comment;
 //$professionalsms = isset($_POST['professionalsms']) ? $_POST['professionalsms'] : die();
 //$employersms = isset($_POST['employersms']) ? $_POST['employersms'] : die();
 //$customer_mobile = isset($_POST['mobile']) ? $_POST['mobile'] : die();
 //$landline = isset($_POST['phone']) ? $_POST['phone'] : "";
 //$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : die();
// $surname = isset($_POST['surname']) ? $_POST['surname'] : die();



// query products
$stmt = $appointment->create($prof_id, $cust_id, $application_id, $county_id, $date, $time, $address,  $budget, $commision, $agent_id, $comment, $status, $delivery_address);



// check if more than 0 record found
if($stmt){
	echo json_encode(
        array("message" => "Appointment cloned.")
    );
} 
else{
    echo json_encode(
        array("message" => "No Appointment found.")
    );
}
?>