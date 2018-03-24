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


// initialize object
$professional = new Professional($db);


 
// query products
$stmt = $professional->uploadPhotos($_POST['prof_id'], $_FILES);
//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if($stmt){ 
    echo json_encode(
        array("message" => "Images uploaded successfully.","images"=>$stmt,"error"=>0)
    );
}else{
    echo json_encode(
        array("message" => "Something went wrong.","error"=>1)
    );
}
?>