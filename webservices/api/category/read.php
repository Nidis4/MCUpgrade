<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/category.php';
include_once '../objects/application.php';

 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$category = new Category($db);
 
// query categorys
$stmt = $category->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $categories_arr=array();
    //$categories_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $application = new Application($db);
        $application->category_id = $id;
        $stmtApp = $application->readByCategory();
        $num = $stmtApp->rowCount();
        $applications_arr=array();
        // check if more than 0 record found
        if($num>0){
         
            // products array
            //$applications_arr=array();
            //$applications_arr["records"]=array();
         
            // retrieve our table contents
            // fetch() is faster than fetchAll()
            // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
            while ($rowApp = $stmtApp->fetch(PDO::FETCH_ASSOC)){
                // extract row
                // this will make $row['name'] to
                // just $name only
                //extract($rowApp);
         
                $application_item=array(
                    "id" => $rowApp['id'],
                    "category_id" => $rowApp['category_id'],
                    "title" => $rowApp['title'],
                    "title_greek" => $rowApp['title_greek']
                );
         
                array_push($applications_arr, $application_item);
            }
         
        }
 
        $category_item=array(
            "id" => $id,
            "title" => $title,
            "title_greek" => $title_greek,
            "description" => html_entity_decode($description),
            "description_greek" => html_entity_decode($description_greek),
            "meta_title" => $meta_title,
            "meta_description" => $meta_description,
            "meta_robots" => $meta_robots,
            "permalink" => $permalink,
            "sequence" => $sequence,
            "modified" => $modified,
            "commissionRate" => html_entity_decode($commissionRate),
            "applications" => $applications_arr
        );
 
        array_push($categories_arr, $category_item);
    }
 
    echo json_encode($categories_arr);
}
 
else{
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>