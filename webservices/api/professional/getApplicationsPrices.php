<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/professional.php';
 
// utilities
$utilities = new Utilities();
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$professional = new Professional($db);
 
// query products
$professional->id = isset($_GET['id']) ? $_GET['id'] : die();
$stmt = $professional->getApplicationsPrices();
if($stmt){
    $num = $stmt->rowCount();

    if($num>0){
        $application_array = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $application_item=array(
                "application_id" => $row['application_id'],
                "category_id" => $row['category_id'],
                "category_name" => $row['category_name'],
                "application_title" => $row['application_title'],
            );
     
            array_push($application_array, $application_item);
        }
        echo json_encode(
            array("records" => $application_array)
        );

    }else{
        echo json_encode(
            array("message" => "No Applications found.")
        );
    }

}else{
    echo json_encode(
        array("message" => "No Applications found.")
    );
}

?>