<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/professional.php';
include_once '../objects/viber.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

$email = isset($_POST['email']) ? $_POST['email'] : die();
$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : die();

// initialize object
$professional = new Professional($db);

 
// query products
$stmt = $professional->checkProf($email, $mobile);
if($stmt['error'] == 0){
    $customer_mobile = '6940589493';
    //$customer_mobile = $mobile;
    $rand = mt_rand(100000,999999);
    $smsTexts = "Κωδικός επιβεβαίωσης ".$rand." για την εγγραφή σας. Παρακαλώ εισάγεται τον κωδικό στο πεδίο «κωδικός επιβεβαίωσης»";

    // Viber Connection         
    $viber = new Viber($db);
    
    //$viber->send($customer_mobile, $smsTexts);
    $stmt['smsTexts'] = $rand;
}
echo json_encode($stmt );

?>