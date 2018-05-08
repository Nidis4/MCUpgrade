<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/day.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

date_default_timezone_set('Europe/Athens');
$Pdatetimeadded = date("Y-m-d H:i:s");

// initialize object
$day = new Day($db);


$mon = $_POST['monStart'].'-'.$_POST['monEnd'];
$tue = $_POST['tueStart'].'-'.$_POST['tueEnd'];
$wed = $_POST['wedStart'].'-'.$_POST['wedEnd'];
$thu = $_POST['thuStart'].'-'.$_POST['thuEnd'];
$fri = $_POST['friStart'].'-'.$_POST['friEnd'];
$sat = $_POST['satStart'].'-'.$_POST['satEnd'];


// query products
$stmt = $day->update(1,$mon);
$stmt = $day->update(2,$tue);
$stmt = $day->update(3,$wed);
$stmt = $day->update(4,$thu);
$stmt = $day->update(5,$fri);
$stmt = $day->update(6,$sat);

//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if($stmt){
 
    echo json_encode(
        array("message" => "Hours updated successfully.")
    );
}
 
else{
    echo json_encode(
        array("message" => "Please try again.")
    );
}
?>