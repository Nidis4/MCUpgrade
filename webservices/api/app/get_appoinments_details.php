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
if(isset($_REQUEST['id']))
{
    $id=isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";

// query appointment
    $stmt = $GetAppoinments->GetAppoinmentsDetails($id);
    $num = $stmt->rowCount();

// check if more than 0 record found
    if($num>0){

    // appointment array
        $appointments_arr=array();
        date_default_timezone_set('Europe/Athens');
        $CDate = date("Y-m-d H:i:s");
        $UpdateAppointmentViewedStatuss = $GetAppoinments->UpdateAppointmentViewedStatus($id,$CDate);
    // retrieve our table contents
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

           // print_r($row);
        // extract row
        // this will make $row['id'] to
        // just $name only
            extract($row);
            $county_name = $GetAppoinments->getCountryNameByID($country_id);
            $PhoneAndMobile = $GetAppoinments->getCustomersContactDetails($cust_member_id);
            $CustomersEmail = $GetAppoinments->getCustomersAccountInfo($cust_member_id);
            $CategoriesName = $GetAppoinments->getCategoriesName($application_id);
            //print_r($getCustomersContactDetails);
            //extract($PhoneAndMobile);
 
            $agent = array('first_name' => $afname, 'last_name' => $alname);
            $appointment_item=array(
                "id" => $id,
                "date" => $date,
                "time" => $time,
                "name" => $first_name,
                "email" => $CustomersEmail,
                "budget" => $budget,
                "commision" => $commision,
                "googleEventId" => $googleEventId,
                "land_line" => $PhoneAndMobile['phone'],
                "comment" => $comment,
                "surname" => $last_name,
                "county_name" => $county_name,
                "address" => $address,
                "del_address" => $del_address,
                "distance" => $distance,
                "is_offer" => "0",
                "offer_json" => $offer_json,
                "close_times" => $close_times,
                "mobile" => $PhoneAndMobile['mobile'],
                "agent" => $agent,
                "categories_name" => $CategoriesName,
                "appointments_status" => $status
                );

            array_push($appointments_arr, $appointment_item);
        }
        $row_array['status'] = "1";
        $row_array['data'] = $appointment_item;
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