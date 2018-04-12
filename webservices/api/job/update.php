<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/job.php';
include_once '../../../functions.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();



// initialize object
$job = new Job($db);

$job_id        = isset($_POST['job_id']) ? $_POST['job_id'] : die();
$category_id   = isset($_POST['category_id']) ? $_POST['category_id'] : die();
$customer_id   = isset($_POST['customer_id']) ? $_POST['customer_id'] : "";
$title         = isset($_POST['job_title']) ? $_POST['job_title'] : die();
$description   = isset($_POST['job_description']) ? $_POST['job_description'] : "";
$offers        = isset($_POST['job_offers']) ? $_POST['job_offers'] : die();
$budget        = isset($_POST['job_budget']) ? $_POST['job_budget'] : die();
$commission    = isset($_POST['job_commission']) ? $_POST['job_commission'] : "";
$charge_admin  = isset($_POST['job_charge_admin']) ? $_POST['job_charge_admin'] : "";
$email         = isset($_POST['job_email']) ? $_POST['job_email'] : die();
$questions     = isset($_POST['job_question']) ? json_encode($_POST['job_question']) : "";
$phone         = isset($_POST['job_phone']) ? $_POST['job_phone'] : "";

$city          = isset($_POST['job_city']) ? $_POST['job_city'] : "";
$county        = isset($_POST['job_county']) ? $_POST['job_county'] : "";
$country       = isset($_POST['job_country']) ? $_POST['job_country'] : "";
$postcode      = isset($_POST['job_postcode']) ? $_POST['job_postcode'] : "";


$first_name    = isset($_POST['first_name']) ? $_POST['first_name'] : "";
$last_name     = isset($_POST['last_name']) ? $_POST['last_name'] : "";

$lat = "";
$long = "";

// query products
$stmt = $job->update($job_id, $title, $description, $offers, $budget, $commission, $charge_admin, $email, $questions, $phone);
//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if(@$stmt){ 
	$job->update_address($job_id, $city, $county, $country, $postcode, $lat, $long);
    echo json_encode(
        array("message" => "Job updated successfully.","job_id" => mcencode($stmt), "error"=>0)
    );
}
else{
    echo json_encode(
        array("message" => "Something went wrong.","error"=>1)
    );
}
?>