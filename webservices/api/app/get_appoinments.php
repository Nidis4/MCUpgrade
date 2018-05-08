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
if(isset($_REQUEST['member_id']) && isset($_REQUEST['page']))
{
    $member_id=isset($_REQUEST["member_id"]) ? $_REQUEST["member_id"] : "";
    $page=isset($_REQUEST["page"]) ? $_REQUEST["page"] : "";

// query appointment
    $stmt = $GetAppoinments->GetAppoinments($member_id,$page,"1','4");
    
    $num = $stmt->rowCount();

// check if more than 0 record found
    if($num>0){

    // appointment array
        $appointments_arr=array();

    // retrieve our table contents
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            //print_r($row);
        // extract row
        // this will make $row['id'] to
        // just $name only
            extract($row);
            $customerName = $GetAppoinments->getCountryNameByID($country_id);
            $close_times_V = $GetAppoinments->getAppointmentsOffersDetails($id);
            $close_times = $close_times_V['close_times'];

            $appointment_item=array(
                "id" => $id,
                "date" => $date,
                "time" => $time,
                "name" => $first_name,
                "surname" => $last_name,
                "county_name" => $customerName,
                "address" => $address,
                "status" => $status,
                "close_times" => $close_times
                );

            array_push($appointments_arr, $appointment_item);
        }
        $row_array['status'] = "1";
        $row_array['page'] = $_REQUEST['page'];
        $row_array['data'] = $appointments_arr;
        echo json_encode($row_array);
    }

    else{
        $row_array['status'] = "0";
        $row_array['msg'] = "No appoinment found";
        echo json_encode($row_array);
    }
}
else{
    $row_array['status'] = "0";
    $row_array['msg'] = "Please enter parameter";
    echo json_encode($row_array);
}
?>