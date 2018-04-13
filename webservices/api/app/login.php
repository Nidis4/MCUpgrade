<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once 'ProfessionalClass.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$GetLoginProfessional = new ProfessionalClass($db);

// get keywords
if(isset($_REQUEST['email']) && isset($_REQUEST['password']))
{
    $email=isset($_REQUEST["email"]) ? $_REQUEST["email"] : "";
    $password=isset($_REQUEST["password"]) ? $_REQUEST["password"] : "";
    $device_token=isset($_REQUEST["device_token"]) ? $_REQUEST["device_token"] : "";
    $device_status=isset($_REQUEST["device_status"]) ? $_REQUEST["device_status"] : "";

    // query Professional
    $stmt = $GetLoginProfessional->LoginProfessional($email,$password);
   
    $num = $stmt->rowCount();

    // check if more than 0 record found
    if($num>0){

        // retrieve our table contents
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        /*print_r($row);
        die();*/
        // extract row
        // this will make $row['id'] to
        // just $name only
        extract($row);
        $Professional = $GetLoginProfessional->getProfessionalByID($professional_id);
        $PostMemberDeviceToken = $GetLoginProfessional->PostMemberDeviceToken($professional_id,$device_token,$device_status);
        $professional_item=array(
            "id" => $professional_id,
            "first_name" => $Professional['first_name'],
            "last_name" => $Professional['last_name'],
            "email" => $email,
            "calendar_id" => $email
            );

        $row_array['status'] = "1";
        $row_array['msg'] = "Login successfully done";
        $row_array['data'] = $professional_item;
        echo json_encode($row_array);
    }

    else{
        $row_array['status'] = "0";
        $row_array['msg'] = "Issue on login";
        echo json_encode($row_array);
    }
}
else{
    $row_array['status'] = "0";
    $row_array['msg'] = "Please enter parameter";
    echo json_encode($row_array);
}
?>