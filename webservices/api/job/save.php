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

$category_id   = isset($_POST['job_category']) ? $_POST['job_category'] : die();
$title         = isset($_POST['job_title']) ? $_POST['job_title'] : die();
$offers        = isset($_POST['job_offers']) ? $_POST['job_offers'] : die();
$budget        = isset($_POST['job_budget']) ? $_POST['job_budget'] : die();
$email         = isset($_POST['job_email']) ? $_POST['job_email'] : die();
$questions     = isset($_POST['job_question']) ? json_encode($_POST['job_question']) : "";
$phone         = isset($_POST['job_phone']) ? $_POST['job_phone'] : "";
 
// query products
$stmt = $job->add($category_id, $title, $budget, $offers, $email, $questions, $phone);
//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if(@$stmt){ 
    echo json_encode(
        array("message" => "Job added successfully.","job_id" => mcencode($stmt), "error"=>0)
    );
}
else{
    echo json_encode(
        array("message" => "Something went wrong.","error"=>1)
    );
}
?>