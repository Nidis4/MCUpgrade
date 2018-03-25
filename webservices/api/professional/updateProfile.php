<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/professional.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

$prof_id = isset($_POST['prof_id']) ? $_POST['prof_id'] : die();
$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : "";
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : "";
$service_area = isset($_POST['service_area']) ? $_POST['service_area'] : "";
$description = isset($_POST['description']) ? $_POST['description'] : "";
$address = isset($_POST['address']) ? $_POST['address'] : "";
$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : "";
$profile_img = isset($_FILES['profile_img']) ? $_FILES['profile_img'] : "";


// initialize object
$professional = new Professional($db);
 
// query products
$stmt = $professional->updateProfile($prof_id, $first_name, $last_name, $service_area, $description, $address, $mobile, $profile_img);
//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if($stmt){
    echo json_encode(
        array("message" => "Professional updated successfully.")
    );
}else{
    echo json_encode(
        array("message" => "No Professional found.")
    );
}
?>