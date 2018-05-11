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
$permalink = isset($_GET['permalink']) ? $_GET['permalink'] : die();


//echo $category->id;

    // create array
    $stmt = $category->read_cat_id($permalink);
 
    $category_arr=array(
        "category_id" => $category->category_id,
        "meta_title" => $category->meta_title,
        "meta_description" => $category->meta_description,
        "meta_robots" => $category->meta_robots,
        "permalink" => $category->permalink


        
    );
     
    echo json_encode($category_arr);
?>