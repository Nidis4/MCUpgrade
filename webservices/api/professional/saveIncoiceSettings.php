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
$stmt = $professional->updateInvoiceSettings($_POST['professional_id'], $_POST['company_name'], $_POST['profession'], $_POST['address'], $_POST['tax_id'], $_POST['tax_office']);
//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if($stmt){
 
    echo json_encode(
        array("message" => "Invoice settings updated successfully.")
    );
}
 
else{
    echo json_encode(
        array("message" => "No Professional found.")
    );
}
?>