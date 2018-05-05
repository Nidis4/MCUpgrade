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


$customer_id = isset($_POST['customer_id']) ? $_POST['customer_id'] : die();
$viewtype = isset($_POST['viewtype']) ? $_POST['viewtype'] : "";

$company_name = isset($_POST['company_name']) ? $_POST['company_name'] : "";
$profession = isset($_POST['profession']) ? $_POST['profession'] : "";
$address = isset($_POST['address']) ? $_POST['address'] : "";
$tax_id = isset($_POST['tax_id']) ? $_POST['tax_id'] : "";
$tax_office = isset($_POST['tax_office']) ? $_POST['tax_office'] : "";
$receipt_email = isset($_POST['receipt_email']) ? $_POST['receipt_email'] : "";


// initialize object
$customer = new Customer($db);
 
// query products
$stmt = $customer->updateInvoiceSettings($customer_id, $company_name, $profession, $address, $tax_id, $tax_office, $receipt_email, $viewtype );





if($stmt){

    echo json_encode(
        array("message" => "Invoice settings updated successfully.")
    );
}
 
else{
    echo json_encode(
        array("message" => "No customer found.")
    );
}
?>