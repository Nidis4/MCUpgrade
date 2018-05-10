<?php
// include database and object files
include_once '../config/database.php';
include_once 'CallClass.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$Calls = new CallClass($db);
$stmt = $Calls->GetCallOutboundSchedule();
$num = $stmt->rowCount();
if($num>0){
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$callTimeRemanning = $Calls->CheckCallOutboundSchedule($callTime);
		$callTimeRemanning = '2';
		if($callTimeRemanning !='' && $callTimeRemanning >= '0' && $callTimeRemanning <= '2'){
			$from = $Calls->GetSIPNumberForCall($agent_id);
			$Calls->UpdateCallOutboundSchedule($id);
			if($from != '' && $from != '0' && $mobile != ''){
				$username='fswitch'; // username to auth on switch
				$password='f12345ss'; // password to auth on switch
				$switch_ip='45.32.156.152'; // switch IP address
				$switch_port='8181'; // switch listening TCP port
				$callerid = '302103008270';

				$to_send='http://'.$switch_ip.':'.$switch_port.'/api/luarun?outbound.lua'.'%20'.$from.'%20'.$mobile.'%20'.$callerid;
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$to_send);
				curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
				curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
				$result=curl_exec($ch);
				echo $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); // status code
				curl_close ($ch);
			}

		}

	}
}
?>