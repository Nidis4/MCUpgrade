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
$mobile=isset($_GET["mobile"]) ? $_GET["mobile"] : die();
 
// query products
$stmt = $customer->searchByMobile($mobile);
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
        $customer_id = $customer_id;
    }
 
    echo $customer_id;
}
 
else{



    $stmt = $customer->update("", $_POST['firstname'], $_POST['surname'], $_POST['address'], $_POST['sex'], $_POST['mobile'], $_POST['phone'], $_POST['email']);
    echo $stmt;
}
?>