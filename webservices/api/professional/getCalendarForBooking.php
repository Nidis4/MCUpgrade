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
$professional->county_id = isset($_GET['county_id']) ? $_GET['county_id'] : die();
$professional->application_id = isset($_GET['application_id']) ? $_GET['application_id'] : die();
$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : die();
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : die();
$addressAppoint = isset($_GET['address']) ? $_GET['address'] : die();
$duration = isset($_GET['address']) ? $_GET['address'] : die();
$addressAppointEn = urlencode($addressAppoint);
 

// query categorys
$stmt = $professional->available();
$num = $stmt->rowCount();

$allProfessionals = array();
$urls = array();
// check if more than 0 record found
if($num>0){
 
    // professional array
    $professionals_arr=array();
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $url = "";
        $dist = "";
        $time = "";
        $response = "";
        $response_a = "";

        if ($address != ""){
            $addressEn = urlencode($address);
            $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$addressEn."&destinations=".$addressAppointEn."&key=AIzaSyA1FK-ipf2Xe0W74fo7nnyufuA0Yh1JMFE";
            array_push($urls, $url);
        }
        else{
            $dist="Unknown";
        }
        $opening = "09:00";
        $closing = "20:00";
        $busy_arr = getBusySlots($startDate, $endDate, $id,$professional);
        $calendar = getCalendarDetails($startDate, $endDate, $opening, $closing, $busy_arr);
        $days = dateDiff($startDate, $endDate) + 1;

        $professional_item=array(
            "id" => $id,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "daysSearch" => $days,
            "address" => $address,
            "Appointment" => $addressAppoint,
            "distance" => $dist,
            "busy" => $busy_arr,
            "calendar" => $calendar
        );
 
        array_push($professionals_arr, $professional_item);
    }

    $distances = calcutateDistances($urls);
    $d=0;

    foreach($professionals_arr as $row => $professional_item){  

        if ( $professional_item['distance'] == "" ){
        //if ( ($professional_item['distance'] == "") || !empty($professional_item['busy']) ){

            $distance = $distances[$d];

            $response_a = json_decode($distance, true);

            if($response_a['status'] != 'OK' ||  $response_a['rows'][0]['elements'][0]['status'] == "NOT_FOUND") {
               $dist = "NOT OK";
            }  
            else{
                $dist = $response_a['rows'][0]['elements'][0]['distance']['value'];
                $time = $response_a['rows'][0]['elements'][0]['status'];
            }
            $professionals_arr[$row]['distance'] = $dist;
            
            $d++;
        }

            foreach($professional_item['busy'] as $busy_row => &$busy_item){

                $distance = $distances[$d];
                $response_a = json_decode($distance, true);

                if($response_a['status'] != 'OK' ||  $response_a['rows'][0]['elements'][0]['status'] == "NOT_FOUND") {
                   $dist = "NOT OK";
                }  
                else{
                    $dist = $response_a['rows'][0]['elements'][0]['distance']['value'];
                    $time = $response_a['rows'][0]['elements'][0]['status'];
                }
                //echo "Αποσταση: ".$dist."<br>";
                //echo "Value: ".$professional_item['busy'][$busy_row]['distance']."<br>";
                $professionals_arr[$row]['busy'][$busy_row]['distance'] =$dist;

                $d++;

            }
        
    }

    echo json_encode($professionals_arr);
} 
else{
    echo json_encode(
        array("message" => "No Application found.")
    );
}

function calcutateDistances($nodes){
    $node_count = count($nodes);

    $curl_arr = array();
    $master = curl_multi_init();

    for($i = 0; $i < $node_count; $i++)
    {
        $url =$nodes[$i];
        $curl_arr[$i] = curl_init($url);
        curl_setopt($curl_arr[$i], CURLOPT_RETURNTRANSFER, true);
        curl_multi_add_handle($master, $curl_arr[$i]);
    }

    do {
        curl_multi_exec($master,$running);
    } while($running > 0);


    for($i = 0; $i < $node_count; $i++)
    {
        $results[] = curl_multi_getcontent  ( $curl_arr[$i]  );
    }
    return $results;
}

function getBusySlots($startDate, $endDate, $id, $professional){
    global $addressAppointEn, $urls;
    
    $stmt = $professional->busySlots($startDate, $endDate, $id);

    $busy_arr = array();
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $addressEn = urlencode($address);
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$addressEn."&destinations=".$addressAppointEn."&key=AIzaSyA1FK-ipf2Xe0W74fo7nnyufuA0Yh1JMFE";
        array_push($urls, $url);

        $busy_item = array(
            "date" => $date,
            "timeslot" => $time,
            "address" => $address,
            "distance" => $url
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
        if ($i==0){
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
        }

        while ($closing != $time){

            //echo $x;
                $address = "";
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
                        $address = $busyTimeSlot = $busy_arr[$x]['address'];
                    }
                    if (($busyDate==$date) && ($timeto == $endBusy)){
                        $inBusy = 0;
                        $address = $busyTimeSlot = $busy_arr[$x]['address'];
                        $x++;
                    }
                    if ($inBusy == 1){
                        $address = $busyTimeSlot = $busy_arr[$x]['address'];
                    }
                }

            $calendar_item = array(
                "date" => $date,
                "timefrom" => $timefrom,
                "timeto" => $timeto,
                "address" => $address,
                "distance" => ""
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