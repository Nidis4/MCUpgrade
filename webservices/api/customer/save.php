<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/customer.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();




// initialize object
$customer = new Customer($db);
 
// query products
$stmt = $customer->update($_POST['customer_id'], $_POST['first_name'], $_POST['last_name'], $_POST['address'], $_POST['sex'], $_POST['mobile'], $_POST['phone'], $_POST['email'], $_POST['mobile2']);
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