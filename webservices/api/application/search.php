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

$term = isset($_POST['term']) ? $_POST['term'] : die();
 
// query categorys
$application->addSearchTerm($term);
$stmt = $application->search($term);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $applications_arr=array();
    $applications_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $application_item=array(
            "id" => $application_id,
            "title_greek" => $title_greek,
        );
 
        array_push($applications_arr["records"], $application_item);
    }
 
    echo json_encode($applications_arr);
}
 
else{
    echo json_encode(
        array("message" => "No Application found.")
    );
}
?>