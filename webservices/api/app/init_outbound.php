<?php
// include database and object files
include_once '../config/database.php';
include_once 'CallClass.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$Calls = new CallClass($db);

if (isset($_REQUEST['admin_email'])&&isset($_REQUEST['number'])) {
	$admin_email = $_REQUEST['admin_email'];
	$from = $Calls->GetSIPNumberForCall($admin_email);
	$to = $_REQUEST['number'];
	if($from != '' && $from != '0' && $to != ''){
		$username='fswitch'; // username to auth on switch
		$password='f12345ss'; // password to auth on switch
		$switch_ip='45.32.156.152'; // switch IP address
		$switch_port='8181'; // switch listening TCP port
		$callerid = '302103008270';

		$to_send='http://'.$switch_ip.':'.$switch_port.'/api/luarun?outbound.lua'.'%20'.$from.'%20'.$to.'%20'.$callerid;

		// Fire
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
?>