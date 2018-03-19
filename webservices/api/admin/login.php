<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/admin.php';
 
// instantiate database and admin object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$admin = new Admin($db);
$admin->username = isset($_POST['username']) ? $_POST['username'] : die();
$admin->password = isset($_POST['password']) ? $_POST['password'] : die();

// query Admins
$stmt = $admin->login();
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


        $admin->loginUser($id);
     
        if($type == 1){
            $usertype = "Admin";
        }else if($type == 2){
            $usertype = "Manager";
        }else if($type == 3){
            $usertype = "Agent";
        }else{
            $usertype = "";
        }


       

        $admin_item=array(
            "ResultCode" => "1",
            "id" => $id,
            "username" => $username,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "email" => $email,
            "type" => $usertype,
            "last_login" => $last_login,
            "active" => $active
        );
 
        
        //admin_array
        //array_push($admin_arr, $admin_item);
    }
 
    echo json_encode($admin_item);
}
 
else{
    echo json_encode(
        array("ResultCode" => "0")
    );
}
?>