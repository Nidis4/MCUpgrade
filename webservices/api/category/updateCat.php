<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/category.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$category = new Category($db);

$meta_title = isset($_POST['meta_title']) ? $_POST['meta_title'] : die();
$meta_description = isset($_POST['meta_description']) ? $_POST['meta_description'] : die();
$meta_robots = isset($_POST['meta_robots']) ? $_POST['meta_robots'] : die();
$permalink = isset($_POST['permalink']) ? $_POST['permalink'] : die();
$id = isset($_POST['id']) ? $_POST['id'] : die();
 
// query categorys
$stmt = $category->updateCat($id, $meta_title, $meta_description, $meta_robots, $permalink, $tags);

if($stmt){ 
    echo json_encode(
        array("message" => "Update Completed.")
    );
}
 
else{
    echo json_encode(
        array("message" => "No Application changed.")
    );
}

?>