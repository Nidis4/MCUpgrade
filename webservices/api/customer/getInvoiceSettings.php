<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/customer.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$customer = new Customer($db);
// query products
$customer->id = isset($_GET['id']) ? $_GET['id'] : die();

$stmt = $customer->getIncoiceSettings();

$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num >= 1){  
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $return = array(
                    'customer_id' => $customer->id,
                    'company_name' => $row['company_name'],
                    'profession' => $row['profession'],
                    'address' => $row['address'],
                    'tax_id' => $row['tax_id'],
                    'tax_office' => $row['tax_office'],
                    'receipt_email' => $row['receipt_email'],
                    'viewtype' => $row['viewtype'],
                );
    echo json_encode(
            array("record" => $return,'message'=>"")
        );

}else{
    echo json_encode(
            array("message" => "No Record found.")
        );
}

?>