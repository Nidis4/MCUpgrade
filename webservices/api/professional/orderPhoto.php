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

$professional->id = isset($_POST['prof_id']) ? $_POST['prof_id'] : die();

$photos = $_POST['photos'];

if(@$photos){
	foreach ($photos as $id => $order) {
		# code...
		$professional->orderPhoto($id, $order);
	}
}

 
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