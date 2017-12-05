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
 
// get keywords
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
 
// query products
$stmt = $customer->search($keywords);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $customers_arr=array();
    //$products_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $customer_item=array(
            "id" => $id,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "sex" => $sex,
            "address" => $address." ".$area." ".$postcode,
            "phone" => $phone,
            "mobile" => $mobile,
            "email" => $email
        );
 
        array_push($customers_arr, $customer_item);
    }
 
    echo json_encode($customers_arr);
}
 
else{
    echo json_encode(
        array("message" => "No Customers found.")
    );
}
?>