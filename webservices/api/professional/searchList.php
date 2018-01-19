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
 
// get keywords
$name = isset($_GET["n"]) ? $_GET["n"] : "";
$surname = isset($_GET["s"]) ? $_GET["s"] : "";
$mobile = isset($_GET["m"]) ? $_GET["m"] : "";
$address = isset($_GET["e"]) ? $_GET["e"] : "";
 
// query products
$stmt = $professional->searchList($name, $surname, $mobile, $address);
//$stmt = $customer->search($keywords);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $professionals_arr=array();
    //$products_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $professional_item=array(
            "id" => $id,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "address" => $address,
            "mobile" => $mobile,
            "phone" => $phone,
            "admin_comments" => $admin_comments
        );
 
        array_push($professionals_arr, $professional_item);
    }
 
    echo json_encode($professionals_arr);
}
 
else{
    echo json_encode(
        array("message" => "No Professional found.")
    );
}
?>