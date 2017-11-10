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
    $admin_arr=array();
    $admin_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $admin_item=array(
            "id" => $id,
            "username" => $username,
            "password" => $password,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "email" => $email,
            "mobile_nr" => $mobile_nr,
            "password_changed" => $password_changed,
            "type" => $type,
            "last_login" => $last_login,
            "active" => $active
        );
 
        array_push($admin_arr["records"], $admin_item);
    }
 
    echo json_encode($admin_arr);
}
 
else{
    echo json_encode(
        array("message" => "No Admins found.")
    );
}
?>