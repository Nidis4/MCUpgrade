<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/appointment.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$appointment = new Appointment($db);
 

 $prof_id = isset($_POST['prof_id']) ? $_POST['prof_id'] : die();
 $cust_id = isset($_POST['cust_id']) ? $_POST['cust_id'] : die();
 $application_id = isset($_POST['application_id']) ? $_POST['application_id'] : die();
 $date = isset($_POST['date']) ? $_POST['date'] : die();
 $time = isset($_POST['time']) ? $_POST['time'] : die();
 $address = isset($_POST['address']) ? $_POST['address'] : die();
 $budget = isset($_POST['budget']) ? $_POST['budget'] : die();
 $commision = isset($_POST['commision']) ? $_POST['commision'] : die();
 $agent_id = isset($_POST['agent_id']) ? $_POST['agent_id'] : die();
 $comment = isset($_POST['comment']) ? $_POST['comment'] : die();

// query products
$stmt = $appointment->create($prof_id, $cust_id, $application_id, $date, $time, $address, $budget, $commision, $agent_id, $comment);
//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if($stmt){ 
    /*echo json_encode(
        array("message" => "Appointment updated successfully.")
    );*/

    echo $stmt;
}
 
else{
    echo json_encode(
        array("message" => "No Appointment found.")
    );
}
?>