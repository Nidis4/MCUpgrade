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
$addressAppointEn = urlencode($addressAppoint);

// query categorys
$stmt = $professional->available();
$num = $stmt->rowCount();

$allProfessionals = array();
$urls = array();
// check if more than 0 record found
if($num>0){
 
    // products array
    $professionals_arr=array();

    //$busy_arr = array();
    //$applications_arr["records"]=array();
 
    
    

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

        $busy_arr = getBusySlots($startDate, $endDate, $id,$professional);
        
        $professional_item=array(
            "id" => $id,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "address" => $address,
            "Appointment" => $addressAppoint,
            "distance" => $dist,
            "busy" => $busy_arr
        );
 
        array_push($professionals_arr, $professional_item);
    }

    $distances = calcutateDistances($urls);
    $d=0;

    foreach($professionals_arr as $row => $professional_item){  

        if ($professional_item['distance'] == ""){
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
?>