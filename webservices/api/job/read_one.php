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
include_once '../objects/job.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$job = new Job($db);

// set ID property of product to be edited
$job->id = isset($_GET['id']) ? $_GET['id'] : die();


//echo $category->id;

    // create array
    $stmt = $job->readOne();
 
    $job_arr=array(
        "id" => $job->id,
        "customer_id" => $job->customer_id,
        "category_id" => $job->category_id,
        "email" => $job->email,
        "title" => $job->title,
        "budget" => $job->budget,
        "offers" => $job->offers,
        "questions" => $job->questions,
        "phone" => $job->phone,
        "datetimeCreated" => $job->datetimeCreated,
        "offer_balance" => $job->offer_balance,
        "status" => $job->status,
    );
     
 
    echo json_encode($job_arr);
?>