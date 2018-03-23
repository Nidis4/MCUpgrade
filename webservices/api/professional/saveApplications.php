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
$stmt = 0;
$ctstmt = 0;
$cnstmt = 0; 
// query products
if(@$_POST['profile_application']){
    $stmt = $professional->updateApplications($_POST['professional_id'], $_POST['profile_application']);
}

if(isset($_POST['profile_main_category'])){
    $ctstmt = $professional->updateMainCategory($_POST['professional_id'], $_POST['profile_main_category']);
}

if(isset($_POST['profile_main_county'])){
    $cnstmt = $professional->updateMainCounty($_POST['professional_id'], $_POST['profile_main_county']);
}



//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if($stmt){
    echo json_encode(
        array("message" => "Price List updated successfully.")
    );
}else if($ctstmt){
    echo json_encode(
        array("message" => "Main Category updated successfully.")
    );
}else if($cnstmt){
    echo json_encode(
        array("message" => "Main County updated successfully.")
    );
}else{
    echo json_encode(
        array("message" => "Something went wrong.")
    );
}
?>