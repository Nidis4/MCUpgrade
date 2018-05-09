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
$stmt = 0;
if(@$_POST['startTime'] && @$_POST['endTime']){
	$stmt = $day->save($_POST['date'],$_POST['startTime'],$_POST['endTime'],0);
}else if(@$_POST['holiday']){
	$stmt = $day->save($_POST['date'],"","",1);
}


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