<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/appointment.php';
include_once '../objects/payment.php';
 
// utilities
$utilities = new Utilities();
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$payment = new Payment($db);
 
// query products
$payment->professional_id = isset($_GET['prof_id']) ? $_GET['prof_id'] : die();

$stmt = $payment->paymentByProf();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $payments_arr=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $payment_item = array(
            "payment_id" => $id,
            "datetime_added" => $datetime_added,
            "amount" => $amount,
            "category_id" => $category_id,
            "appointment_details" => "",
            "comment" => $comment,
            "budget" => "",
            "commision" => "",
            "payment" => $amount, 
            "agent_id" => $agent_id,
            "payment_status" => $status,
            "balance" => "0",
            "cancelReason" => $cancelReason,
            "datetimeStatusUpdated" => $datetimeStatusUpdated,
            "cancelComment" => $cancelComment,            
            "type" => $type
        );
 
        array_push($payments_arr, $payment_item);
    }
    

    $appointment = new Appointment($db);
    $stmt = $appointment->readPagingByProf(0, 1000, $payment->professional_id);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $payment_item = array(
            "datetime_added" => $date." ".substr($time, 0, 5).":00",
            "category_id" => $application_id,
            "appointment_details" => $address,
            "comment" => $comment,
            "budget" => $budget,
            "commision" => $commision,
            "payment" => "",
            "agent_id" => $agent_id,
            "appointment_status" => $status,
            "balance" => "0"
        );
 
        array_push($payments_arr, $payment_item);
    }

    // echo "<pre>";
    // print_r($payments_arr);
    // die;


    usort($payments_arr, function($a, $b) {
        return strtotime($a['datetime_added']) - strtotime($b['datetime_added']);
    });

    $tolBalance = 0;
    foreach($payments_arr as &$item) {

        if(@$item['payment_id']){
             if ($item['payment_status'] == 1){
                //echo "1";
                $item['balance'] = round($tolBalance + $item['amount'],2);
                $tolBalance = $item['balance'];
            }
            else{
                //echo "2";
                $item['balance'] = $tolBalance;
            }
        }else{
            if ($item['appointment_status']==1){
                //echo "1";
                $item['balance'] = round($tolBalance - $item['commision'],2);
                $tolBalance = $item['balance'];
            }
            else{
                //echo "2";
                $item['balance'] = $tolBalance;
            }
        }

        


    }

    usort($payments_arr, function($a, $b) {
        return strtotime($b['datetime_added']) - strtotime($a['datetime_added']);
    });
 
    echo json_encode($payments_arr);
}
else{
    echo json_encode(
        array("message" => "No Payments found.")
    );
}
?>