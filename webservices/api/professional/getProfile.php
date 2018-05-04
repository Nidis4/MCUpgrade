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

$stmt = $professional->getProfile();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num >= 1){  
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($row);
    $return = array(
                    'id' => $professional->id,
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'description' => $row['description'],
                    'service_area' => $row['service_area'],
                    'image' => $row['image'],
                    'address' => $row['address'],
                    'mobile' => $row['mobile'],
                    'verified' => $row['verified'],
                    'balance' => '0',
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