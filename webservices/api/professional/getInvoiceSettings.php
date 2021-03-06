<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/professional.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$professional = new Professional($db);
// query products
$professional->id = isset($_GET['id']) ? $_GET['id'] : die();

$stmt = $professional->getIncoiceSettings();

$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num >= 1){  
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $return = array(
                    'professional_id' => $professional->id,
                    'company_name' => $row['company_name'],
                    'profession' => $row['profession'],
                    'address' => $row['address'],
                    'tax_id' => $row['tax_id'],
                    'tax_office' => $row['tax_office'],
                    'business_type' => $row['business_type'],
                    'vat_number' => $row['vat_number'],
                    'country' => $row['country'],
                    'pc' => $row['pc'],
                    'land_line' => $row['land_line'],
                    'mobile_phone' => $row['mobile_phone'],
                    'receipt_email' => $row['receipt_email'],
                    'id_card_number' => $row['id_card_number'],
                    'personal_vat_id' => $row['personal_vat_id'],
                    'website' => $row['website'],
                    'directory_link' => $row['directory_link'],
                    'viewtype' => $row['viewtype'],
                    'company_stamp' => $row['company_stamp'],
                    'id_card' => $row['id_card'],
                );
    echo json_encode(
            array("record" => $return)
        );

}else{
    echo json_encode(
            array("message" => "No Record found.")
        );
}

?>