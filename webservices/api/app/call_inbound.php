<?php
// include database and object files
include_once '../config/database.php';
include_once 'CallClass.php';
$GroupList = array();
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$Calls = new CallClass($db);
$uuid=isset($_REQUEST["uuid"]) ? $_REQUEST["uuid"] : "";
$from=isset($_REQUEST["from"]) ? $_REQUEST["from"] : "";
$to=isset($_REQUEST["to"]) ? $_REQUEST["to"] : "";
if(isset($_REQUEST['uuid']) && isset($_REQUEST['from']) && isset($_REQUEST['to']))
{
    

    $stmt = $Calls->GetAdminSipNumber();
    $num = $stmt->rowCount();
    if($num>0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $obj = $row['sip_number'];
            array_push($GroupList, $obj);
        }
        $row_array['uuid'] = $uuid;
        $row_array['group_list'] = $GroupList;
        echo json_encode($row_array);
    }
    else{
        $row_array['uuid'] = $uuid;
        $row_array['group_list'] = $GroupList;
        echo json_encode($row_array);
    }
   
}
else{
  $row_array['uuid'] = $uuid;
  $row_array['group_list'] = $GroupList;
  echo json_encode($row_array);
}

?>
