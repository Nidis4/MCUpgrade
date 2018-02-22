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

include_once '../objects/payment.php';
 
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
    "email" => $professional->email,
    "calendar_id" => $professional->calendar_id,
    "admin_comments" => $professional->admin_comments,
    "viewtype" => $professional->viewtype,
    "image1" => $professional->image1,
    "image2" => $professional->image2,
    "image3" => $professional->image3,
    "perid1" => $professional->perid1,
    "perid2" => $professional->perid2,
    "agreement1" => $professional->agreement1,
    "agreement2" => $professional->agreement2,
    "agreement3" => $professional->agreement3,
    "agreement4" => $professional->agreement4,
    "agreement5" => $professional->agreement5,
    "approve_per" => $professional->approve_per,
    "approve_doc" => $professional->approve_doc,
);
   
    $payment = new Payment($db);
    $percentage = $payment->get_percentage($_GET['id']);
    $professional_arr['percentage'] = $percentage;
    
    echo json_encode($professional_arr);
?>