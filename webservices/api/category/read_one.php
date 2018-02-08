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
include_once '../objects/category.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$category = new Category($db);

// set ID property of product to be edited
$category->id = isset($_GET['id']) ? $_GET['id'] : die();


//echo $category->id;

    // create array
    $stmt = $category->readOne();
 
    $category_arr=array(
        "id" => $category->id,
        "title" => $category->title,
        "title_greek" => $category->title_greek,
        "description" => $category->description,
        "description_greek" => $category->description_greek,
        "sequence" => $category->sequence,
        "modified" => $category->modified,
        "commissionRate" => $category->commissionRate
    );
     
 
    echo json_encode($category_arr);
?>