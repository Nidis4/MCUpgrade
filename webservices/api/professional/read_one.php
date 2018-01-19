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
include_once '../objects/professional.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$professional = new Professional($db);

// set ID property of product to be edited
$professional->id = isset($_GET['id']) ? $_GET['id'] : die();


//echo $customer->id;

// create array
$stmt = $professional->readOne();
 
        $professional_arr=array(
            "id" => $professional->id,
            "first_name" => $professional->first_name,
            "last_name" => $professional->last_name,
            "sex" => $professional->sex,
            "address" => $professional->address,
            "profile_status" => $professional->profile_status,
            "mobile" => $professional->mobile,
            "phone" => $professional->phone,
            "email" => $professional->email
        );
     
 
    echo json_encode($professional_arr);
?>