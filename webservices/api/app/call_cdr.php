<?php
// include database and object files
include_once '../config/database.php';
include_once 'CallClass.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$Calls = new CallClass($db);


    $uuid=isset($_REQUEST["uuid"]) ? $_REQUEST["uuid"] : "";
    $cdr=isset($_REQUEST["cdr"]) ? $_REQUEST["cdr"] : "";

    $call_duration = $Calls->InsertCallCdr($uuid,$cdr);
    
    $log = "==================================".PHP_EOL;
    $log = $log.date("F j, Y, g:i a").PHP_EOL;
    $log = $log.htmlspecialchars($uuid).PHP_EOL;
    $log = $log.htmlspecialchars($cdr).PHP_EOL;

    // log
    file_put_contents('/tmp/log_cdr_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
    $datas = json_decode($cdr);
    if(isset($datas->variables->api_initiated)){

        $billsec = $datas->variables->billsec;
        if($billsec > 0){
            $New_Uuid = substr($uuid, 2);
            $resultuuid = substr($uuid, 0, 2);
            if($resultuuid =='a_'){
                $wavfile = 'http://recordmcr.eu/webservice/ivr_recording/'.$New_Uuid.'.wav';

                $from = $datas->variables->api_call_from;
                //echo $to = $datas->variables->api_call_to;
                $to = '6944700644';
               
                $CREATED_DATE = date("Y-m-d H:i:s");
                $mainquery_row = $Calls->GetAdminId($from);
                $AppointmentCheck = $Calls->AppointmentCheck($to);
                $ProfessionalsCheck = $Calls->ProfessionalsCheck($to);
                if($AppointmentCheck !='0' && $AppointmentCheck !='0'){
                 
                    $fullname = $AppointmentCheck['first_name']."||".$AppointmentCheck['last_name'];
                    $profileType ='Customer';
                    $callname = $AppointmentCheck['first_name'];
                    $callsurname = $AppointmentCheck['last_name'];
                    $cust_or_prof_id = $AppointmentCheck['id'];
                }
                elseif($ProfessionalsCheck !='0' && $ProfessionalsCheck !='0'){
                 
                    $fullname = $ProfessionalsCheck['first_name']."||".$ProfessionalsCheck['last_name'];
                    $profileType ='Customer';
                    $callname = $ProfessionalsCheck['first_name'];
                    $callsurname = $ProfessionalsCheck['last_name'];
                    $cust_or_prof_id = $ProfessionalsCheck['id'];
                }
                else{
                    $profileType ='Other';
                    $callname = $to;
                    $callsurname = '('.$CREATED_DATE.')';
                    $cust_or_prof_id ='0';
                }
                $resultsss = substr($to, 0, 2);
                $calldate = date("Y-m-d");
                if($resultsss == '69'){
                    $InsertCall = $Calls->InsertCall($cust_or_prof_id,$profileType,$calldate,$billsec,$mainquery_row['id'],$callname,$callsurname,$to,$wavfile,$CREATED_DATE,$uuid);
                }
                else{
                    $InsertCall = $Calls->InsertCall($cust_or_prof_id,$profileType,$calldate,$billsec,$mainquery_row['id'],$callname,$callsurname,$to,$wavfile,$CREATED_DATE,$uuid);
                }

            }
        }
    }
?>
OK