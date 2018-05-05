<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/call.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$call = new Call($db);
 

 $CallId = isset($_POST['CallId']) ? $_POST['CallId'] : die();
 $commentcall = isset($_POST['commentcall']) ? $_POST['commentcall'] : die();



// query products
$stmt = $call->create($CallId, $commentcall);
//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if($stmt){ 
    

   

    echo $stmt;
}
 
else{
    echo json_encode(
        array("message" => "No Call found.")
    );
}
?>