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
include_once '../objects/call.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$call = new Call($db);

// set ID property of product to be edited
$call->id = isset($_GET['id']) ? $_GET['id'] : die();


//echo $appointment->id;

// create array
$stmt = $call->readOne($call->id);
 
        $call_arr=array(
            "id" => $call->id,
            "about" => $call->about,
            "name" => $call->name,
            "surname" => $call->surname,
            "date" => $call->date,
            "duration" => $call->duration,
            "mobile" => $call->mobile,
            "land_line" => $call->land_line,
            "rconrding" => $call->rconrding,
            "comment" => $call->comment,
            "call_status" => $call->call_status
        );
     
    echo json_encode($call_arr);
?>