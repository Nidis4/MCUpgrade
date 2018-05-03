<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$appointments_array = array();
if(isset($_REQUEST['member_id']))
{
    $member_id=isset($_REQUEST["member_id"]) ? $_REQUEST["member_id"] : "";
    $payments = file_get_contents('https://upgrade.myconstructor.gr/webservices/api/app/payment.php?prof_id='.$member_id);
    $paymentsPag = json_decode($payments, true);
    //print_r($paymentsPag);
    if (array_key_exists("main_status",$paymentsPag))
    {
        $row_array['status'] = "0";
        $row_array['data'] = $appointments_array;
        echo json_encode($row_array);
    }
    else{
        foreach ($paymentsPag as $payment) {
            $obj['id'] = $payment['id'];
            $obj['amount'] = $payment['amount'];
            $obj['name'] = $payment['name'];
            $obj['address'] = $payment['address'];
            $obj['budget'] = $payment['budget'];
            $obj['commision'] = $payment['commision'];
            $obj['datetimeCreated'] = $payment['datetime_added'];
            $obj['status2'] = $payment['status2'];
            $obj['Balance'] = $payment['balance'];
            $obj['date'] = $payment['date'];
            $obj['time'] = $payment['time'];
            $appointments_array[]=$obj; 

        }
        $row_array['status'] = "1";
        $row_array['data'] = $appointments_array;
        echo json_encode($row_array);
    }

}
else{
    $row_array['status'] = "0";
    $row_array['msg'] = "Please enter parameter";
    echo json_encode($row_array);
}
?>