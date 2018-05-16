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
include_once '../objects/customer.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$customer = new Customer($db);

// set ID property of product to be edited
$customer->id = isset($_GET['id']) ? $_GET['id'] : die();


//echo $customer->id;

// create array
$stmt = $customer->readOne();
 
        $customer_arr=array(
            "id" => $customer->id,
            "first_name" => $customer->first_name,
            "last_name" => $customer->last_name,
            "sex" => $customer->sex,
            "address" => $customer->address,
            "phone" => $customer->phone,
            "mobile" => $customer->mobile,
            "mobile2" => $customer->mobile2,
            "email" => $customer->email
        );
     
 
    echo json_encode($customer_arr);
?>