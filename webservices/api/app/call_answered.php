<?php
// include database and object files
include_once '../config/database.php';
include_once 'CallClass.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$GetCalls = new CallClass($db);


    $uuid=isset($_REQUEST["uuid"]) ? $_REQUEST["uuid"] : "";
    $from=isset($_REQUEST["from"]) ? $_REQUEST["from"] : "";
    $to=isset($_REQUEST["to"]) ? $_REQUEST["to"] : "";

// query appointment
    $call_duration = $GetCalls->GetCallDuration($uuid);
    $InsertCallAnswered = $GetCalls->InsertCallAnswered($uuid,$from,$to,$call_duration);
    $log = "==================================".PHP_EOL;
     $log = $log.date("F j, Y, g:i a").PHP_EOL;
     $log = $log.htmlspecialchars($uuid).PHP_EOL;
     $log = $log.htmlspecialchars($from).PHP_EOL;
     $log = $log.htmlspecialchars($to).PHP_EOL;

     // log
     file_put_contents('/tmp/log_answered_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
?>
OK