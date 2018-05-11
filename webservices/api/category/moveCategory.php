<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/category.php';
 
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$category = new Category($db);
 
$stmt = $category->moveCategory();
 
// check if more than 0 record found
if($stmt >= 1){    

     echo json_encode(
            array("message" => "Categories Move Successfully")
        );
}
else
{
        echo json_encode(
            array("message" => "Please try again")
        );
}

?>