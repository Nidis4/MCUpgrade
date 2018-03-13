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
$addressAppoint = isset($_GET['address']) ? $_GET['address'] : die();
$addressAppointEn = urlencode($addressAppoint);

$dateAp = isset($_GET['date']) ? $_GET['date'] : die();
$timeAp = isset($_GET['time']) ? $_GET['time'] : die();

$arr = explode("-", $timeAp, 2);
$startAp = $dateAp." ".$arr[0];
$endAp = $dateAp." ".$arr[1];

$startDate = $dateAp;
$endDate = $dateAp;
 
// /$address = 'Ηλείας 51, Chalandri, Greece';
$stmt = $professional->restAvailable($dateAp, $timeAp, $addressAppoint);
$num = $stmt->rowCount();

$allProfessionals = array();
$urls = array();
// check if more than 0 record found
if($num>0){
 
    // professional array
    $professionals_arr=array();
    $availProfessionals_arr=array();
    
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
        $opening = "06:00";
        $closing = "22:00";
        $busy_arr = isBusy($startAp, $endAp, $startDate, $endDate, $id,$professional);
        $days = dateDiff($startDate, $endDate) + 1;

        $professional_item=array(
            "id" => $id,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "daysSearch" => $days,
            "address" => $address,
            "Appointment" => $addressAppoint,
            "distance" => $dist,
            "busy" => $busy_arr
            //"calendar" => $calendar
        );
 
        array_push($professionals_arr, $professional_item);
    }

    $distances = calcutateDistances($urls);
    $d=0;


    $min_distance = 100000;
    $min_id = -1;
    foreach($professionals_arr as $row => $professional_item){  

        if ( $professional_item['distance'] == "" ){
            $distance = $distances[$d];
            $response_a = json_decode($distance, true);
            if($response_a['status'] != 'OK' ||  $response_a['rows'][0]['elements'][0]['status'] == "NOT_FOUND") {
               $dist = "NOT OK";
            }  
            else{
                $dist = $response_a['rows'][0]['elements'][0]['distance']['value'];
                //$time = $response_a['rows'][0]['elements'][0]['status'];
            }
            $professionals_arr[$row]['distance'] = $dist;
            $d++;

            if ($professionals_arr[$row]['distance']!="Unknown"){
                array_push($availProfessionals_arr, $professionals_arr[$row]);
                if ( ($professionals_arr[$row]['distance'] < $min_distance) && ($professionals_arr[$row]['busy']=="Free") ) {
                    $min_id = $professionals_arr[$row]['id'];
                    $min_distance = $professionals_arr[$row]['distance'];
                }
            }
        }
        
    }

    echo json_encode(
        array("prof_id" => $min_id, "min_distance"=> $min_distance)
    );
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

function isBusy($startAp, $endAp, $startDate, $endDate, $id,$professional){
    
    $stmt = $professional->busySlots($startDate, $endDate, $id);



    $busy_arr = array();
    $busy = "Free";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $arr = explode("-", $time, 2);
        $startBusy = $date." ".$arr[0];
        $endBusy = $date." ".$arr[1];

        if (($startAp <= $endBusy) and ($endAp >= $startBusy)){
            $busy = "Busy";
        }

        $busy_item = array(
            "date" => $date,
            "timeslot" => $time,
            "startBusy" => $startBusy,
            "endBusy" => $endBusy,
            "busy" => $busy
        );
        array_push($busy_arr, $busy_item);
    }
   
    //return $busy_arr;
    return $busy;
    //return json_encode($busy_arr);
}

function dateDiff($start, $end) {
    $start_ts = strtotime($start);
    $end_ts = strtotime($end);
    $diff = $end_ts - $start_ts;
    return round($diff / 86400);
}
?>