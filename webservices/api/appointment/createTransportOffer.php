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
 

 $cust_id = isset($_POST['cust_id']) ? $_POST['cust_id'] : fail();
 $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : fail();
 $application_id = isset($_POST['application_id']) ? $_POST['application_id'] : fail();
 $address = isset($_POST['address']) ? $_POST['address'] : fail();
 $budget = isset($_POST['budget']) ? $_POST['budget'] : fail();
 $county_id = isset($_POST['county_id']) ? $_POST['county_id'] : fail();
 $commision = isset($_POST['commision']) ? $_POST['commision'] : fail();
 $agent_id = isset($_POST['agent_id']) ? $_POST['agent_id'] : fail();
 $comment = isset($_POST['comment']) ? $_POST['comment'] : fail();
 $customer_mobile = isset($_POST['mobile']) ? $_POST['mobile'] : fail();
 $landline = isset($_POST['phone']) ? $_POST['phone'] : "";
 $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : fail();
 $surname = isset($_POST['surname']) ? $_POST['surname'] : fail();
 $status = isset($_POST['status']) ? $_POST['status'] : "3";
 $htmlTransport = isset($_POST['htmlTransport']) ? $_POST['htmlTransport'] : fail();

 $delivery_address= isset($_POST['delivery_address']) ? $_POST['delivery_address'] : fail();

$prof_id = "0";
$date = isset($_POST['date']) ? $_POST['date'] : fail();
$time = "";
// /$status = 3;


// query products
$stmt = $appointment->createTransportOffer($prof_id, $cust_id, $application_id, $county_id, $date, $time, $address, $budget, $commision, $agent_id, $comment, $status, $delivery_address, $htmlTransport );



//$stmt = $appointment->create('', $cust_id, $application_id, '', '', $address, $budget, $commision, $agent_id, $comment,'3');
//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 if($stmt){ 
 	echo json_encode(
       array("message" => "Completed")
 	);
 }
 else{
 	echo json_encode(
       array("message" => "No Appointment found.")
 	);
 }
// check if more than 0 record found

function fail(){
	echo json_encode(
       array("Error" => "Missing Argument")
 	);
 	die();
}
?>