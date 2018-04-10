<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/professional.php';
 
// instantiate database and admin object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$professional = new Professional($db);
$professional->username = isset($_POST['username']) ? $_POST['username'] : die();
$professional->password = isset($_POST['password']) ? $_POST['password'] : die();

// query Admins
$stmt = $professional->login();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){
 
    // admins array
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        if($status == "2"){
            $professional->loginUser($id); 
            $admin_item=array(
                "ResultCode" => "1",
                "id" => $id,
                "username" => $email,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "last_login" => $last_login,
                "type" => 'Professional',
                "status" => $status
            );
            echo json_encode($admin_item);

        }elseif($status == "0" || $status == "1"){
            echo json_encode(
                array("ResultCode" => "0",'message' => 'Your account is pending.')
            );
        }elseif($status == "3"){
            echo json_encode(
                array("ResultCode" => "0",'message' => 'Your account is deactivate.')
            );
        }else{
            echo json_encode(
                array("ResultCode" => "0",'message' => 'Έχετε πληκτρολογήσει λάθος στοιχεία. Παρακαλώ προσπαθήστε ξανά!')
            );
        }
        
 
        //admin_array
        //array_push($admin_arr, $admin_item);
    }
 
    
}
 
else{
    echo json_encode(
        array("ResultCode" => "0",'message' => 'Έχετε πληκτρολογήσει λάθος στοιχεία. Παρακαλώ προσπαθήστε ξανά!')
    );
}
?>