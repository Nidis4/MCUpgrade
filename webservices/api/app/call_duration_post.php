<?php
// include database and object files
include_once '../config/database.php';
include_once 'CallClass.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$Calls = new CallClass($db);
$stmt = $Calls->CheckCallDuration();
$num = $stmt->rowCount();
if($num>0){
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$uuid = $row["uuid_ivr"];
		$duration = $Calls->GetCallDurationFormCallCdr($uuid);
		if($duration !='' && $duration !='0' && $row["id"] !=''){
			$Calls->UpdateCallDuration($row['id'],$duration);
		}
		
	}
}
?>