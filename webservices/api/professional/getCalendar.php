<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/professional.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$professional = new Professional($db);
$professional->professional_id = isset($_GET['prof_id']) ? $_GET['prof_id'] : die();

if (!isset($_GET['startDate']) || !isset($_GET['endDate']) ){
    $today = date("Y-m-d");
    $startDate = date("Y-m-d", strtotime('-7 day',strtotime($today)));
    $endDate = date("Y-m-d", strtotime('+14 day',strtotime($today)));
}
else{
    $startDate = $_GET['startDate'];
    $endDate   = $_GET['endDate'];
}
$professional->professional_id = isset($_GET['prof_id']) ? $_GET['prof_id'] : die();
$professional->professional_id = isset($_GET['prof_id']) ? $_GET['prof_id'] : die();

$id = $professional->professional_id;

    

        $url = "";
        $dist = "";
        $time = "";
        $response = "";
        $response_a = "";

        $opening = "06:00";
        $closing = "22:00";
        $busy_arr = getBusySlots($startDate, $endDate, $id,$professional);
        $calendar = getCalendarDetails($startDate, $endDate, $opening, $closing, $busy_arr);
        $days = dateDiff($startDate, $endDate) + 1;

        $professional_item=array(
            "id" => $id,
            "daysSearch" => $days,
            "busy" => $busy_arr,
            "calendar" => $calendar
        );
 
        //array_push($professionals_arr, $professional_item);


    echo json_encode($professional_item);



function getBusySlots($startDate, $endDate, $id, $professional){
    global $addressAppointEn, $urls;
    
    $stmt = $professional->busySlots($startDate, $endDate, $id);

    $busy_arr = array();
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $addressEn = urlencode($address);
        //$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$addressEn."&destinations=".$addressAppointEn."&key=AIzaSyA1FK-ipf2Xe0W74fo7nnyufuA0Yh1JMFE";
        //array_push($urls, $url);

        $busy_item = array(
            "type" => $type,
            "date" => $date,
            "timeslot" => $time,
            "address" => $address,
            "id" => $id
            //"distance" => $url
        );
        array_push($busy_arr, $busy_item);
    }

    
    return $busy_arr;
    //return json_encode($busy_arr);
}

function getCalendarDetails($startDate, $endDate, $opening, $closing, $busy_arr){
    $days = dateDiff($startDate, $endDate) + 1;
    $calendar_arr = array();
    $busySlots = count($busy_arr);
    $inBusy = 0;
    $address = "";
    if ($busySlots > 0){
        $x = 0;
    }
    else{ 
        $x = -1;
    }

    for ( $i = 0;  $i < $days; $i++){
        $time = $opening;

        $add_days = $i;
        $date = date('Y-m-d',strtotime($startDate) + (24*3600*$add_days));

        /*if ($i==0){
            $date = $startDate;
        }
        else if ($i==1){
            $date = date("Y-m-d", strtotime('+1 day',strtotime($startDate)));
        }
        else if ($i==2){
            $date = date("Y-m-d", strtotime('+2 days',strtotime($startDate)));
        }
        else if ($i==3){
            $date = date("Y-m-d", strtotime('+3 days',strtotime($startDate)));
        }
        else if ($i==4){
            $date = date("Y-m-d", strtotime('+4 days',strtotime($startDate)));
        }*/

        while ($closing != $time){

            //echo $x;
                $address = "";
                $type = "";
                $id = "";
                $distance = "";
                if ($x >=0 && $x < $busySlots){
                    $busyDate = $busy_arr[$x]['date'];
                    $busyTimeSlot = $busy_arr[$x]['timeslot'];
                    $arr = explode("-", $busyTimeSlot, 2);
                    $startBusy = $arr[0];
                    $endBusy = $arr[1];
                    //$address = $busyDate." ".$startBusy." ".$endBusy;
                }

                $timefrom = $time;
                $timeto = date("H:i", strtotime('+30 minutes',strtotime($time)));


                if ($x >=0 && $x < $busySlots){
                    $busyDate = $busy_arr[$x]['date'];
                    $busyTimeSlot = $busy_arr[$x]['timeslot'];
                    $arr = explode("-", $busyTimeSlot, 2);
                    $startBusy = $arr[0];
                    $endBusy = $arr[1];
                    //$address = $busyDate." ".$startBusy." ".$endBusy;

                    if (($busyDate==$date) && ($timefrom == $startBusy)){
                        $inBusy = 1;
                        $address = $busy_arr[$x]['address'];
                        $type = $busy_arr[$x]['type'];
                        $id = $busy_arr[$x]['id'];
                    }
                    if (($busyDate==$date) && ($timeto == $endBusy)){
                        $inBusy = 0;
                        $address = $busy_arr[$x]['address'];
                        $type = $busy_arr[$x]['type'];
                        $id = $busy_arr[$x]['id'];
                        $x++;
                    }
                    if ($inBusy == 1){
                        $address = $busy_arr[$x]['address'];
                        $type = $busy_arr[$x]['type'];
                        $id = $busy_arr[$x]['id'];
                    }
                }

            $calendar_item = array(
                "date" => $date,
                "timefrom" => $timefrom,
                "timeto" => $timeto,
                "type" => $type,
                "id" => $id,
                "address" => $address
            );
            $time = $timeto;
            array_push($calendar_arr, $calendar_item);
        }

    }

     return $calendar_arr;

}

function dateDiff($start, $end) {
    $start_ts = strtotime($start);
    $end_ts = strtotime($end);
    $diff = $end_ts - $start_ts;
    return round($diff / 86400);
}
?>