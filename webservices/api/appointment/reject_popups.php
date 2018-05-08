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
$agent_id = isset($_GET['agent_id']) ? $_GET['agent_id'] : fail();


$stmt = $appointment->rejectpopups($_GET['agent_id']);

// check if more than 0 record found
if($stmt){

	 if(@$stmt['category_id']){
            $categoryN = $appointment->getCategoryByID($stmt['category_id']);
            $stmt['categoryName'] = $categoryN['title'];
            
        }else{
            $stmt['categoryName'] = "";
        }
	
   echo json_encode($stmt);


}else{
	echo json_encode(
        array("message" => "No appointments found.")
    );
}



?>