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
if(isset($_REQUEST['member_id']))
{
    $member_id=isset($_REQUEST["member_id"]) ? $_REQUEST["member_id"] : "";

    $stmt = $GetAppoinments->GetProfessionalsCategory($member_id);
    $num = $stmt->rowCount();

// check if more than 0 record found
    if($num>0){

    // appointment array
        $appointments_arr=array();

    // retrieve our table contents
        $count = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $count ++;
        // just $name only
            extract($row);
            $customerName = $GetAppoinments->GetCategoryHelp($category_id);
            $numcustomerName = $customerName->rowCount();
            
            if($numcustomerName>0){
                $rowd = $customerName->fetch();
                extract($rowd);
                $CheckApplicationExist = $GetAppoinments->CheckApplicationExist($id);
                $numCheckApplicationExist = $CheckApplicationExist->rowCount();
                if($numCheckApplicationExist>0){
                    $is_application = '1';
                }
                else{
                    $is_application = '0';
                }
                $appointment_item=array(
                    "category_id" => $id,
                    "name" => $name,
                    "help" => $help,
                    "is_application" => $is_application
                    );

                array_push($appointments_arr, $appointment_item);
            }
            
        }
        if (!empty($appointments_arr)) {
            $row_array['status'] = "1";
            $row_array['count'] = $count;
            $row_array['data'] = $appointments_arr;
            echo json_encode($row_array);
        }
        else{
            $row_array['status'] = "0";
            $row_array['msg'] = 'Categories help not found';
            $row_array['data'] = $appointments_arr;
            echo json_encode($row_array);

        }
        
    }

    else{
        $row_array['status'] = "0";
        $row_array['msg'] = "User categories not found";
        echo json_encode($row_array);
    }
}
else{
    $row_array['status'] = "0";
    $row_array['msg'] = "Please enter parameter";
    echo json_encode($row_array);
}
?>