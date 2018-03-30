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

$id = isset($_POST['id']) ? $_POST['id'] : "";
$prof_id = isset($_POST['prof_id']) ? $_POST['prof_id'] : "";
$busy_date = isset($_POST['busy_date']) ? $_POST['busy_date'] : "";
$busy_time = isset($_POST['busy_time']) ? $_POST['busy_time'] : "";

// initialize object
$professional = new Professional($db);

if (  ($id != "") || ($prof_id != "" && $busy_date != "" && $busy_time != "") ){
	// query products
	$stmt = $professional->deleteBusy($id, $prof_id, $busy_date, $busy_time);   

	if($stmt){
	    echo json_encode(
	        array("message" => "Busy Time Deleted.")
	    );
	}else{
	    echo json_encode(
	        array("message" => "Busy Time Not Deleted")
	    );
	}
}
else{
	echo json_encode(
	    array("message" => "Busy Time Not Deleted.")
    );
}

?>
