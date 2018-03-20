<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/application.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$application = new Application($db);
$application->id = isset($_GET['app_id']) ? $_GET['app_id'] : die();
 
// query categorys
$stmt = $application->readOne();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $applications_arr=array();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    extract($row);

    $professionals_stmt = $application->getProfessionalsByApplication($id);
    $professionals_arr = array();

    while ($rowProf = $professionals_stmt->fetch(PDO::FETCH_ASSOC)){
        
        $prof_item = array(
            "id" => $rowProf['id'],
            "first_name" => $rowProf['first_name'],
            "last_name" => $rowProf['last_name'],
            "image" => $rowProf['image'],
            "price" => $rowProf['price'],
            "budget" => $rowProf['budget'],
            "description" => $rowProf['description'],
            "city" => $rowProf['city'],
            "servicearea" => $rowProf['service_area'],
        );

        array_push($professionals_arr, $prof_item);

     }

    $application_item=array(
            "id" => $id,
            "category_id" => $category_id,
            //"title" => $title,
            "title_greek" => $title_greek,
            //"short_description" => html_entity_decode($short_description),
            "short_description_gr" => html_entity_decode($short_description_gr),
            //"detail_description" => html_entity_decode($detail_description),
            "detail_description_gr" => html_entity_decode($detail_description_gr),
            "unit" => $unit,
            "min_price" => $min_price,
            "professionals" => $professionals_arr
        );

    echo json_encode($application_item);

    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop

 }
 
else{
    echo json_encode(
        array("message" => "No Application found.")
    );
}
?>