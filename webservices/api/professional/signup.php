<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/professional.php';
include_once '../objects/viber.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// echo "<pre>";
// print_r($_POST);
// die;

$email = isset($_POST['valEmail']) ? $_POST['valEmail'] : die();
$mobile = isset($_POST['tel']) ? $_POST['tel'] : die();
$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : "";
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : "";
$companyName = isset($_POST['companyName']) ? $_POST['companyName'] : "";
$select_idiotita = isset($_POST['select_idiotita']) ? $_POST['select_idiotita'] : "";
$select_job = isset($_POST['select_job']) ? $_POST['select_job'] : "";
$hear_us = isset($_POST['hear_us']) ? $_POST['hear_us'] : "";
$password = isset($_POST['your_pass']) ? $_POST['your_pass'] : die();

// initialize object
$professional = new Professional($db);

 
// query products
$stmt = $professional->signup($first_name, $last_name, $email, $mobile, $companyName, $select_idiotita, $select_job, $hear_us, $password);
if($stmt){
    echo json_encode(
        array("message" => "Registration successfully","error"=>0)
    );
}else{
	echo json_encode(
        array("message" => "Something went wrong.","error"=>1)
    );
}


?>