<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once 'AppointmentClass.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$GetAppoinments = new AppointmentClass($db);

// get keywords
if(isset($_REQUEST['cat_id']))
{
    $cat_id=isset($_REQUEST["cat_id"]) ? $_REQUEST["cat_id"] : "";

// query appointment
    $stmt = $GetAppoinments->GetApplicationsHelp($cat_id);
    $num = $stmt->rowCount();

// check if more than 0 record found
    if($num>0){

    // appointment array
        $appointments_arr=array();

    // retrieve our table contents
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        // extract row
            extract($row);

            $appointment_item=array(
                "id" => $id,
                "name" => $name,
                "help" => $help
                );

            array_push($appointments_arr, $appointment_item);
        }
        $row_array['status'] = "1";
        $row_array['data'] = $appointments_arr;
        echo json_encode($row_array);
    }

    else{
        $row_array['status'] = "0";
        $row_array['msg'] = "No applications help found";
        echo json_encode($row_array);
    }
}
else{
    $row_array['status'] = "0";
    $row_array['msg'] = "Please enter parameter";
    echo json_encode($row_array);
}
?>