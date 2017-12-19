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
//$addressAppoint = urldecode($addressAppoint);
 
// query categorys
$stmt = $professional->available();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $professionals_arr=array();

    //$busy_arr = array();
    //$applications_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $url = "";
        $dist = "";
        $time ="";
        $response ="";
        $response_a ="";
        if ($address!=""){
            $addressEn = urlencode($address);
            //$addressAppoint = "Ηρακλείτου 113, Χαλάνδρι";
            $addressAppointEn = urlencode($addressAppoint);
            //$response = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=Ηρακλείτου+113,Χαλάνδρι&destinations=Athens&key=AIzaSyA1FK-ipf2Xe0W74fo7nnyufuA0Yh1JMFE");
            //$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$addressEn."&destinations=Athens&key=AIzaSyA1FK-ipf2Xe0W74fo7nnyufuA0Yh1JMFE";
            $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$addressEn."&destinations=".$addressAppointEn."&key=AIzaSyA1FK-ipf2Xe0W74fo7nnyufuA0Yh1JMFE";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = curl_exec($ch);
            curl_close($ch);
        
            $response_a = json_decode($response, true);

            if($response_a['status'] != 'OK' ||  $response_a['rows'][0]['elements'][0]['status'] == "NOT_FOUND") {
               $dist = "NOT OK";
            }

            $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
            $time = $response_a['rows'][0]['elements'][0]['status'];
        }
        else{
            $dist="Unknown";
        }

        $busy_arr = getBusySlots($startDate, $endDate, $id,$professional);
        // extract row
        // this will make $row['name'] to
        // just $name only
        
 
        $professional_item=array(
            "id" => $id,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "address" => $address,
            "Apoointment" => $addressAppoint,
            "distance" => $dist,
            //"time" => $time,
            //"url" => $url,
            //"response" => $response_a,
            "busy" => $busy_arr
        );
 
        array_push($professionals_arr, $professional_item);
    }
 
    echo json_encode($professionals_arr);
} 
else{
    echo json_encode(
        array("message" => "No Application found.")
    );
}

function getBusySlots($startDate, $endDate, $id, $professional){
    $stmt = $professional->busySlots($startDate, $endDate, $id);

    $busy_arr = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $busy_item = array(
            "date" => $date,
            "timeslot" => $time,
            "address" => $address
        );
        array_push($busy_arr, $busy_item);
    }

    
    return $busy_arr;
    //return json_encode($busy_arr);
}
?>