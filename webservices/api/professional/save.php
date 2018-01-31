<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/professional.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

$target_dir = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR.'platform'.DIRECTORY_SEPARATOR.'UserFiles'.DIRECTORY_SEPARATOR.'professionals'.DIRECTORY_SEPARATOR;
$profile_image1 = "";
$profile_image2 = "";
$profile_image3 = "";
$profile_perid1 = "";
$profile_perid2 = "";
$profile_agreement1 = "";
$profile_agreement2 = "";
$profile_agreement3 = "";
$profile_agreement4 = "";
$profile_agreement5 = "";

if(@$_POST['approve_per']){
    $approve_per = 1;
}else{
    $approve_per = 0;
}

if(@$_POST['approve_doc']){
    $approve_doc = 1;
}else{
    $approve_doc = 0;
}

if(@$_FILES['profile_image1']['name']){
    $timet = time();
    $target_file = $target_dir.$timet.'-'.basename($_FILES["profile_image1"]["name"]);
    if(move_uploaded_file($_FILES["profile_image1"]["tmp_name"], $target_file)){
        $profile_image1 = $timet.'-'.basename($_FILES["profile_image1"]["name"]);
    }
}

if(@$_FILES['profile_image2']['name']){
    $timet = time();
    $target_file = $target_dir.$timet.'-'.basename($_FILES["profile_image2"]["name"]);
    if(move_uploaded_file($_FILES["profile_image2"]["tmp_name"], $target_file)){
        $profile_image2 = $timet.'-'.basename($_FILES["profile_image2"]["name"]);
    }
}

if(@$_FILES['profile_image3']['name']){
    $timet = time();
    $target_file = $target_dir.$timet.'-'.basename($_FILES["profile_image3"]["name"]);
    if(move_uploaded_file($_FILES["profile_image3"]["tmp_name"], $target_file)){
        $profile_image3 = $timet.'-'.basename($_FILES["profile_image3"]["name"]);
    }
}


if(@$_FILES['profile_perid1']['name']){
    $timet = time();
    $target_file = $target_dir.$timet.'-'.basename($_FILES["profile_perid1"]["name"]);
    if(move_uploaded_file($_FILES["profile_perid1"]["tmp_name"], $target_file)){
        $profile_perid1 = $timet.'-'.basename($_FILES["profile_perid1"]["name"]);
    }
}

if(@$_FILES['profile_perid2']['name']){
    $timet = time();
    $target_file = $target_dir.$timet.'-'.basename($_FILES["profile_perid2"]["name"]);
    if(move_uploaded_file($_FILES["profile_perid2"]["tmp_name"], $target_file)){
        $profile_perid2 = $timet.'-'.basename($_FILES["profile_perid2"]["name"]);
    }
}

if(@$_FILES['profile_agreement1']['name']){
    $timet = time();
    $target_file = $target_dir.$timet.'-'.basename($_FILES["profile_agreement1"]["name"]);
    if(move_uploaded_file($_FILES["profile_agreement1"]["tmp_name"], $target_file)){
        $profile_agreement1 = $timet.'-'.basename($_FILES["profile_agreement1"]["name"]);
    }
}

if(@$_FILES['profile_agreement2']['name']){
    $timet = time();
    $target_file = $target_dir.$timet.'-'.basename($_FILES["profile_agreement2"]["name"]);
    if(move_uploaded_file($_FILES["profile_agreement2"]["tmp_name"], $target_file)){
        $profile_agreement2 = $timet.'-'.basename($_FILES["profile_agreement2"]["name"]);
    }
}

if(@$_FILES['profile_agreement3']['name']){
    $timet = time();
    $target_file = $target_dir.$timet.'-'.basename($_FILES["profile_agreement3"]["name"]);
    if(move_uploaded_file($_FILES["profile_agreement3"]["tmp_name"], $target_file)){
        $profile_agreement3 = $timet.'-'.basename($_FILES["profile_agreement3"]["name"]);
    }
}

if(@$_FILES['profile_agreement4']['name']){
    $timet = time();
    $target_file = $target_dir.$timet.'-'.basename($_FILES["profile_agreement4"]["name"]);
    if(move_uploaded_file($_FILES["profile_agreement4"]["tmp_name"], $target_file)){
        $profile_agreement4 = $timet.'-'.basename($_FILES["profile_agreement4"]["name"]);
    }
}

if(@$_FILES['profile_agreement5']['name']){
    $timet = time();
    $target_file = $target_dir.$timet.'-'.basename($_FILES["profile_agreement5"]["name"]);
    if(move_uploaded_file($_FILES["profile_agreement5"]["tmp_name"], $target_file)){
        $profile_agreement5 = $timet.'-'.basename($_FILES["profile_agreement5"]["name"]);
    }
}





// initialize object
$professional = new Professional($db);
 
// query products
$stmt = $professional->update($_POST['professional_id'], $_POST['first_name'], $_POST['last_name'], $_POST['address'], $_POST['sex'], $_POST['profile_status'], $_POST['admin_comments'], $_POST['mobile'], $_POST['phone'], $_POST['email'], $_POST['calendar_id'], $profile_image1, $profile_image2, $profile_image3, $profile_perid1, $profile_perid2, $profile_agreement1, $profile_agreement2, $profile_agreement3, $profile_agreement4,$profile_agreement5, $approve_per, $approve_doc);
//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if($stmt){
 
    echo json_encode(
        array("message" => "Professional updated successfully.")
    );
}
 
else{
    echo json_encode(
        array("message" => "No Professional found.")
    );
}
?>