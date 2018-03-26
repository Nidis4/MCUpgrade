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


$prof_id = isset($_POST['professional_id']) ? $_POST['professional_id'] : die();
$company_name = isset($_POST['company_name']) ? $_POST['company_name'] : "";
$profession = isset($_POST['profession']) ? $_POST['profession'] : "";
$address = isset($_POST['address']) ? $_POST['address'] : "";
$tax_id = isset($_POST['tax_id']) ? $_POST['tax_id'] : "";
$tax_office = isset($_POST['tax_office']) ? $_POST['tax_office'] : "";

$business_type = isset($_POST['business_type']) ? $_POST['business_type'] : "";
$vat_number = isset($_POST['vat_number']) ? $_POST['vat_number'] : "";
$country = isset($_POST['country']) ? $_POST['country'] : "";
$pc = isset($_POST['pc']) ? $_POST['pc'] : "";
$land_line = isset($_POST['land_line']) ? $_POST['land_line'] : "";
$mobile_phone = isset($_POST['mobile_phone']) ? $_POST['mobile_phone'] : "";
$receipt_email = isset($_POST['receipt_email']) ? $_POST['receipt_email'] : "";
$id_card_number = isset($_POST['id_card_number']) ? $_POST['id_card_number'] : "";
$personal_vat_id = isset($_POST['personal_vat_id']) ? $_POST['personal_vat_id'] : "";
$website = isset($_POST['website']) ? $_POST['website'] : "";
$directory_link = isset($_POST['directory_link']) ? $_POST['directory_link'] : "";

// initialize object
$professional = new Professional($db);
 
// query products
$stmt = $professional->updateInvoiceSettings($prof_id, $company_name, $profession, $address, $tax_id, $tax_office, $business_type, $vat_number,$country, $pc, $land_line, $mobile_phone, $receipt_email, $id_card_number, $personal_vat_id, $website, $directory_link );
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