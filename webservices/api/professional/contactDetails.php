<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../config/core.php';
include_once '../objects/professional.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$professional = new Professional($db);
 
// query categorys
$stmt = $professional->contactDetails();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $professionals_arr=array();
    $professionals_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $member_item=array(
            "professional_id" => $professional_id,
            "address" => $address,
            "area" => $area,
            "city" => $city,
            "country_id" => $country_id,
            "latitude" => $latitude,
            "longtitude" => $longtitude,
            "mobile" => $mobile,
            "phone" => $phone,
            "postcode" => $postcode
        );
 
        array_push($professionals_arr["records"], $professional_item);
    }
 
    echo json_encode($professionals_arr);
}
 
else{
    echo json_encode(
        array("message" => "No Member found.")
    );
}
?>