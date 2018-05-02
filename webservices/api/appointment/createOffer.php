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
 

 $cust_id = isset($_POST['cust_id']) ? $_POST['cust_id'] : die();
 $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : die();
 $application_id = isset($_POST['application_id']) ? $_POST['application_id'] : die();
 $address = isset($_POST['address']) ? $_POST['address'] : die();
 $budget = isset($_POST['budget']) ? $_POST['budget'] : die();
 $county_id = isset($_POST['county_id']) ? $_POST['county_id'] : die();
 $commision = isset($_POST['commision']) ? $_POST['commision'] : die();
 $agent_id = isset($_POST['agent_id']) ? $_POST['agent_id'] : die();
 $comment = isset($_POST['comment']) ? $_POST['comment'] : die();
 $customer_mobile = isset($_POST['mobile']) ? $_POST['mobile'] : die();
 $landline = isset($_POST['phone']) ? $_POST['phone'] : "";
 $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : die();
 $surname = isset($_POST['surname']) ? $_POST['surname'] : die();
 $status = isset($_POST['status']) ? $_POST['status'] : "3";

$prof_id = "0";
$date = "0000-00-00";
$time = "";
// /$status = 3;


// query products
$stmt = $appointment->create($prof_id, $cust_id, $application_id, $county_id, $date, $time, $address, $budget, $commision, $agent_id, $comment, $status);

//$stmt = $appointment->create('', $cust_id, $application_id, '', '', $address, $budget, $commision, $agent_id, $comment,'3');
//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 if($stmt){ 
 	echo $stmt;
 }
 else{
 	echo json_encode(
       array("message" => "No Appointment found.")
 );
 	}
// check if more than 0 record found

?>