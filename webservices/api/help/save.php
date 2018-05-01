<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/help.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();


$message = "Something went wrong, Please try again.";

// initialize object
$helps = new Help($db);

if(@$_POST['help_id']){
	$stmt = $helps->update($_POST['help_id'], $_POST['category_id'], $_POST['help_name'], $_POST['help_text']);
	if($stmt){ 
	    $message = "Updated successfully";
	}

}else{
	$stmt = $helps->insert($_POST['category_id'], $_POST['help_name'], $_POST['help_text']);
	if($stmt){ 
	    $message = "Added successfully";
	}
}

 
// check if more than 0 record found

echo json_encode(
    array("message" => $message )
);

?>