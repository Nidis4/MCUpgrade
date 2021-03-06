<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/balance.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$balance = new Balance($db);
 
// query categorys
$stmt = $balance->agents($_GET['fromdate'],$_GET['todate']);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $appointments_arr=array();
    $appointments_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $appointment_item = array(
                                "agentId" => $agentId,
                                "agentName" => $agentName,                               
                                "Appointments__totalCommission" => $Appointments__totalCommission                                
                            );
        array_push($appointments_arr["records"], $appointment_item);
 
    }
 
    echo json_encode($appointments_arr);
}
 
else{
    echo json_encode(
        array("message" => "No Record found.")
    );
}
?>