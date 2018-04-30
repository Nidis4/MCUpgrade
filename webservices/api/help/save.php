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




// initialize object
$helps = new Help($db);

if(@$_POST['help_id']){
	$stmt = $helps->update($_POST['help_id'], $_POST['category_id'], $_POST['help_name'], $_POST['help_text']);
}else{
	$stmt = $helps->insert($_POST['category_id'], $_POST['help_name'], $_POST['help_text']);
}
echo "<pre>";
print_r($_POST);
die;
 
// query products
$stmt = $customer->update($_POST['customer_id'], $_POST['first_name'], $_POST['last_name'], $_POST['address'], $_POST['sex'], $_POST['mobile'], $_POST['phone'], $_POST['email']);
//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if($stmt){ 
    echo json_encode(
        array("message" => "Customer updated successfully.")
    );
}
 
else{
    echo json_encode(
        array("message" => "No Customer found.")
    );
}
?>