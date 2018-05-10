<?php
class CallClass{

    // database connection and table name
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }
     public function GetCallDuration($uuid){
       $sql ="SELECT `cdr` FROM `call_cdrs` WHERE `uuid` LIKE '%".$uuid."%'";
        $CheckCallCdrExist = $this->conn->prepare($sql);
        $CheckCallCdrExist->execute();
        $num = $CheckCallCdrExist->rowCount();
        if($num>0){
            $row = $CheckCallCdrExist->fetch(PDO::FETCH_ASSOC);
            $data = json_decode($row['cdr']);
            $cdrsdurationNew = $data->variables->billsec;
        }
        else{
            $qss= "SELECT `cdr` FROM `call_cdrs` ORDER BY `id` DESC LIMIT 0,1";
            $oldcdr = $this->conn->prepare($qss);
            $oldcdr->execute();
            $rowoldcdr = $oldcdr->fetch(PDO::FETCH_ASSOC);
            $dataoldcdr = json_decode($rowoldcdr['cdr']);
            $cdrsdurationNew = $dataoldcdr->variables->billsec;
        }
        if($cdrsdurationNew ==''){
            $cdrsdurationNew = '0';
        }
        return $cdrsdurationNew;
    }
    public function InsertCallAnswered($uuid,$from,$to,$call_duration){
        $sql ="INSERT INTO `call_answered`(`uuid`, `from_call`, `to_call`, `call_duration`) VALUES ('".$uuid."', '".$from."', '".$to."', '".$call_duration."')";
        $InsertCallAnsweredV = $this->conn->prepare($sql);
        $InsertCallAnsweredV->execute();
    }
    public function InsertCallCdr($uuid,$cdr){
        $sql ="INSERT INTO `call_cdrs`(`uuid`, `cdr`) VALUES ('".$uuid."', '".$cdr."')";
        $InsertCallCdrV = $this->conn->prepare($sql);
        $InsertCallCdrV->execute();
    }
    public function GetAdminId($from){
        $sql ="SELECT `id`,`sip_number` FROM `admin` WHERE `sip_number` LIKE '%".$from."%'";
        $GetAdminIdV = $this->conn->prepare($sql);
        $GetAdminIdV->execute();
        return  $GetAdminIdV->fetch(PDO::FETCH_ASSOC);
    }
    public function AppointmentCheck($to){
        $sql ="SELECT `customers`.`first_name`,`customers`.`last_name`,`customers`.`id` FROM `customers_contact_details` JOIN `appointments` ON `customers_contact_details`.`customer_id` = `appointments`.`cust_member_id` JOIN `customers` ON `customers_contact_details`.`customer_id`=`customers`.`id` WHERE `customers_contact_details`.`mobile` = '".$to."' LIMIT 1";
        $AppointmentCheckV = $this->conn->prepare($sql);
        $AppointmentCheckV->execute();
        $num = $AppointmentCheckV->rowCount();
        if($num>0){
            return $AppointmentCheckV->fetch(PDO::FETCH_ASSOC);
        }
        else{
            return 0;
        }
    }
    public function ProfessionalsCheck($to){
        $sql ="SELECT `professionals`.`first_name`,`professionals`.`last_name`,`professionals`.`id` FROM `professionals_contact_details` JOIN `professionals` ON `professionals_contact_details`.`professional_id` = `professionals`.`id` WHERE `professionals_contact_details`.`mobile`='".$to."' ORDER BY `professionals_contact_details`.`professional_id` DESC LIMIT 1";
        $ProfessionalsCheckV = $this->conn->prepare($sql);
        $ProfessionalsCheckV->execute();
        $num = $ProfessionalsCheckV->rowCount();
        if($num>0){
            return $ProfessionalsCheckV->fetch(PDO::FETCH_ASSOC);
        }
        else{
            return 0;
        }
        
    }
    public function InsertCall($cust_or_prof_id,$profileType,$calldate,$billsec,$agentId,$callname,$callsurname,$to,$wavfile,$CREATED_DATE,$uuid){
        
        $resultsss = substr($to, 0, 2);
        if($resultsss == '69'){
            $InserCallRconrd = "INSERT INTO `calls`(`cust_or_prof_id`, `about`, `date`, `duration`, `agent_id`, `name`, `surname`, `mobile`, `rconrding`, `datetimeCreated`, `uuid_ivr`,`call_status`) VALUES ('".$cust_or_prof_id."','".$profileType."','".$calldate."','".$billsec."','".$agentId."','".$callname."','".$callsurname."','".$to."','".$wavfile."','".$CREATED_DATE."','".$uuid."','Outbound')";
        }
        else{
            $InserCallRconrd = "INSERT INTO `calls`(`cust_or_prof_id`, `about`, `date`, `duration`, `agent_id`, `name`, `surname`, `land_line`, `rconrding`, `datetimeCreated`, `uuid_ivr`, `call_status`) VALUES ('".$cust_or_prof_id."','".$profileType."','".$calldate."','".$billsec."','".$agentId."','".$callname."','".$callsurname."','".$to."','".$wavfile."','".$CREATED_DATE."','".$uuid."','Outbound')";
        }
        $InserCallRconrdV = $this->conn->prepare($InserCallRconrd);
        $InserCallRconrdV->execute();
        return 1;
    }
    public function GetAdminSipNumber(){
        $sql ="SELECT `id`,`sip_number` FROM `admin` WHERE `sip_number` !=''";
        $stmt = $this->conn->prepare($sql);
        // execute query
        $stmt->execute();

        return $stmt;
        
        
    }
    public function CheckProfessionalForCall($from){
        $sql ="SELECT `professional_id`,`mobile` FROM `professionals_contact_details` WHERE `mobile`= '".$from."' AND `mobile` !=''";
        $stmt = $this->conn->prepare($sql);
        // execute query
        $stmt->execute();

        return $stmt;
        
    }
    public function CheckProfessionalAppointment($member_id){
        $sql ="SELECT `appointments`.`id`,`appointments`.`prof_member_id`,`appointments`.`time`,`appointments`.`address`,`appointments`.`comment`,`appointments`.`date`,`categories`.`name_greek` ,`customers`.`first_name`,`customers`.`last_name`, `customers_contact_details`.`mobile`,`customers_contact_details`.`phone`FROM `appointments` JOIN `applications` ON `appointments`.`application_id` = `applications`.`id` JOIN `categories` ON `applications`.`category_id` = `categories`.`id` JOIN `customers` ON `appointments`.`cust_member_id`=`customers`.`id` JOIN `customers_contact_details` ON `appointments`.`cust_member_id` = `customers_contact_details`.`customer_id` WHERE `appointments`.`prof_member_id`= '".$member_id."' AND `appointments`.`status`='1' ORDER BY `appointments`.`id` DESC LIMIT 0,1";
        $stmt = $this->conn->prepare($sql);
        // execute query
        $stmt->execute();

        return $stmt;
        
    }
    
    public function GetProfessionalLastname($member_id){
        $sql ="SELECT `last_name` FROM `professionals` WHERE `id` = '".$member_id."'";
        $ProfessionalsCheckV = $this->conn->prepare($sql);
        $ProfessionalsCheckV->execute();
        $num = $ProfessionalsCheckV->rowCount();
        if($num>0){
            return $ProfessionalsCheckV->fetch(PDO::FETCH_ASSOC);
        }
        else{
            return '';
        }
        
    }
    public function GetMonthGreek($dates){
        $date=date_create($dates);
        $Enaglish_month = date_format($date, 'F');
        $greeknonth = "SELECT `greek` FROM `months` WHERE `english` LIKE '%".$Enaglish_month."%'";
        $ProfessionalsCheckV = $this->conn->prepare($greeknonth);
        $ProfessionalsCheckV->execute();
        $resreeknonth = $ProfessionalsCheckV->fetch(PDO::FETCH_ASSOC);
        $dayOfDate = date_format($date,"d");
        return $dayOfDate.' '.$resreeknonth['greek'];
    }
    public function GetDayNameGreek($dates){
        $date=date_create($dates);
        $Enaglish_day = date_format($date, 'D');
        $greeknonth = "SELECT `greek` FROM `days` WHERE `english` LIKE '%".$Enaglish_day."%'";
        $ProfessionalsCheckV = $this->conn->prepare($greeknonth);
        $ProfessionalsCheckV->execute();
        $resreeknonth = $ProfessionalsCheckV->fetch(PDO::FETCH_ASSOC);
        return $resreeknonth['greek'];
    }
    public function GetInitCallData(){
        $sql = "SELECT `id`,`date`,`time` FROM `appointments` WHERE `appointments`.`viewed_remainder_status` IS NULL AND `appointments`.`viewed` ='Not Viewed' AND `appointments`.`prof_member_id` !='0' AND `appointments`.`status`='1' ORDER BY `appointments`.`date` ASC LIMIT 0,1";
        $AppointmentCheckV = $this->conn->prepare($sql);
        $AppointmentCheckV->execute();
        $num = $AppointmentCheckV->rowCount();
        if($num>0){
            return $AppointmentCheckV->fetch(PDO::FETCH_ASSOC);
        }
        else{
            return 0;
        }
    }
    public function GetAppointmentsCallHours($diff,$appointments_DateTime_int){
        $sql = "SELECT TIMESTAMPDIFF(".$diff.",'".$appointments_DateTime_int."',CURRENT_TIMESTAMP) AS HOURS , CURRENT_TIMESTAMP AS cDate";
        $AppointmentCheckV = $this->conn->prepare($sql);
        $AppointmentCheckV->execute();
        $num = $AppointmentCheckV->rowCount();
        
        return $HOURSAppointmentCheckV = $AppointmentCheckV->fetch(PDO::FETCH_ASSOC);
       
    }
    public function GetAppoinmentIntiFailureCall(){
        $sql = "SELECT `id`,`viewed_remainder_status_date_time` FROM `appointments` WHERE `appointments`.`viewed_remainder_status` ='failure' AND `appointments`.`viewed` ='Not Viewed' AND `appointments`.`prof_member_id` !='0' AND `appointments`.`status`='1'";
        $AppointmentCheckV = $this->conn->prepare($sql);
        $AppointmentCheckV->execute();
        $num = $AppointmentCheckV->rowCount();
        if($num>0){
            return $AppointmentCheckV->fetch(PDO::FETCH_ASSOC);
        }
        else{
            return 0;
        }
    }
    public function InitCallMainFunction($row_int_resId){
        $sql ="SELECT `appointments`.`id`,`appointments`.`prof_member_id`,`appointments`.`time`,`appointments`.`address`,`appointments`.`comment`,`appointments`.`date`,`categories`.`name_greek` ,`customers`.`first_name`,`customers`.`last_name`, `customers_contact_details`.`mobile`,`customers_contact_details`.`phone`,`professionals`.`last_name` AS `lname`,`professionals_contact_details`.`mobile` AS `pmobile` FROM `appointments` JOIN `applications` ON `appointments`.`application_id` = `applications`.`id` JOIN `categories` ON `applications`.`category_id` = `categories`.`id` JOIN `customers` ON `appointments`.`cust_member_id`=`customers`.`id` JOIN `customers_contact_details` ON `appointments`.`cust_member_id` = `customers_contact_details`.`customer_id` JOIN `professionals` ON `appointments`.`prof_member_id` = `professionals`.`id` JOIN `professionals_contact_details` ON `appointments`.`prof_member_id` = `professionals_contact_details`.`professional_id` WHERE `appointments`.`id`= '".$row_int_resId."' ";
        $AppointmentCheckV = $this->conn->prepare($sql);
        $AppointmentCheckV->execute();
        $row_int = $AppointmentCheckV->fetch(PDO::FETCH_ASSOC);
        $professional_phone = rawurlencode('30'.$row_int['pmobile']);
        $professional_surname = rawurlencode($row_int['lname']);
        $dateInGreek =  $this->GetMonthGreek($row_int['date']);
        $DayInGreek =  $this->GetDayNameGreek($row_int['date']);
        $appointment_date = rawurlencode($dateInGreek);
        $appointment_day = rawurlencode($DayInGreek);

        $atime = $row_int['time'];
        $arrtime = explode("-", $atime, 2);
        $FFtime = $arrtime[0];
        $arrtimes = explode(":", $FFtime, 2);
        $startTimeHours = $arrtimes[0];
        $startTimeMinuts = $arrtimes[1];
        $newTimeFormat = "στις ".$startTimeHours." και ".$startTimeMinuts;
        $appointment_time = rawurlencode($newTimeFormat);

        $appointment_category = rawurlencode($row_int['name_greek']);
        $customer_address = rawurlencode($row_int['address']);
        $customer_name = rawurlencode($row_int['first_name']);
        $customer_surname = rawurlencode($row_int['last_name']);

        $customer_Mobile = (string)$row_int['mobile'];
        $customer_Mobile_arr = str_split($customer_Mobile, "1");
        $customer_Mobile_Format = implode(", ", $customer_Mobile_arr);
        $customer_phone = rawurlencode($customer_Mobile_Format);

        $customer_land_line = (string)$row_int['phone'];
        $customer_land_line_arr = str_split($customer_land_line, "1");
        $customer_land_line_Format = implode(", ", $customer_land_line_arr);
        $customer_landline = rawurlencode($customer_land_line_Format);
        $comments = rawurlencode($row_int['comment']);
        $data_string = 'apidata='.rawurlencode('{"professional_phone":"'.$professional_phone.'","professional_surname":"'.$professional_surname.'","appointment_day":"'.$appointment_day.'","appointment_date":"'.$appointment_date.'","appointment_time":"'.$appointment_time.'","appointment_category":"'.$appointment_category.'","customer_address":"'.$customer_address.'","customer_name":"'.$customer_name.'","customer_surname":"'.$customer_surname.'","customer_phone":"'.$customer_phone.'","customer_landline":"'.$customer_landline.'","comments":"'.$comments.'"}');

        $username='fswitch'; // username to auth on switch
        $password='f12345ss'; // password to auth on switch
        $switch_ip='45.32.156.152'; // switch IP address
        $switch_port='8181';
        $to_send='http://'.$switch_ip.':'.$switch_port.'/api/lua?reminder.lua';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$to_send);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        $result=curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        echo 'HTTP status code: '.$status_code.PHP_EOL.'Servr response: '.$result.PHP_EOL;
        $json = json_decode($result, true);
        $uuid = $json['uuid'];
        $updateUuid = "UPDATE `appointments` SET `init_uuid`= '".$uuid."',`viewed_remainder_status`='success' WHERE `id`= '".$row_int_resId."'";
        $updateUuidV = $this->conn->prepare($updateUuid);
        $updateUuidV->execute();
    }
    public function GetSIPNumberForCall($admin_email){
        $sql = "SELECT `id`,`sip_number` FROM `admin` WHERE `id` LIKE '%".$admin_email."%'";
        $AppointmentCheckV = $this->conn->prepare($sql);
        $AppointmentCheckV->execute();
        $num = $AppointmentCheckV->rowCount();
        if($num>0){
            $AppointmentCheckV = $AppointmentCheckV->fetch(PDO::FETCH_ASSOC);
            return $AppointmentCheckV['sip_number'];
        }
        else{
            return 0;
        }
    }
    public function CheckAppoinmentExist($appoinments_id){
        $sql = "SELECT `id`,`prof_member_id`,`date`,`time` FROM `appointments` WHERE `appointments`.`status`='1' AND `appointments`.`id`='".$appoinments_id."'";
        $AppointmentCheckV = $this->conn->prepare($sql);
        $AppointmentCheckV->execute();
        $num = $AppointmentCheckV->rowCount();
        if($num>0){
            return $AppointmentCheckV->fetch(PDO::FETCH_ASSOC);
        }
        else{
            return 0;
        }
    }
    public function DeleteBusySlotForCalendar($prof_member_id,$date,$time){
        $query = "DELETE FROM `professionals_busytimes` WHERE `PROFESSIONAL_ID`='".$prof_member_id."' AND `DATE`='".$date."' AND `TIME` ='".$time."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
        
    }
    public function ChangeAppoinmentCancelStatus($appoinments_id,$cancelComment){
        $query = "UPDATE `appointments` SET `cancelComment`='".$cancelComment."',`status`='0',`cancelReason`='2' WHERE `id` = '".$appoinments_id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
    public function CheckuuidForAppointmentsExist($uuid){
        $sql = "SELECT `id`,`viewed_remainder_status` FROM `appointments` WHERE `init_uuid`='".$uuid."'";
        $AppointmentCheckV = $this->conn->prepare($sql);
        $AppointmentCheckV->execute();
        $num = $AppointmentCheckV->rowCount();
        if($num>0){
            return $AppointmentCheckV->fetch(PDO::FETCH_ASSOC);
        }
        else{
            return 0;
        }
    }
    public function UpdateCallFailureAppointments($uuid,$status){
        $CurrentTime = $this->GreeceCurrentTime();
        $query = "UPDATE `appointments` SET `viewed`= 'Viewed', `viewed_datetime`='".$CurrentTime."', `viewed_remainder_status`= '".$status."' WHERE `init_uuid`= '".$uuid."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
    public function UpdateCallFailureElseAppointments($uuid,$status){
        $CurrentTime = $this->GreeceCurrentTime();
        $query = "UPDATE `appointments` SET `viewed_remainder_status`= '".$status."',`viewed_remainder_status_date_time`='".$CurrentTime."' WHERE `init_uuid`= '".$uuid."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
    public function AppointmentsRjectToCall($appoinments_id,$uuid){
        $CurrentTime = $this->GreeceCurrentTime();
        $data = array("id" => $appoinments_id,"cancelComment" => "rejected from IVR ","type"=>"4" );
       
        $autha = 'https://upgrade.myconstructor.gr/webservices/api/appointment/reject.php';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$autha);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $authres=curl_exec ($ch);
        curl_close ($ch);
        
        $query = "UPDATE `appointments` SET `viewed`= 'Viewed', `viewed_datetime`='".$CurrentTime."' WHERE `init_uuid`= '".$uuid."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
    public function GetCallAnsweredForAdminProfile($sip_number){
        $sql = "SELECT `uuid`,`from_call`,`call_duration` FROM `call_answered` WHERE `to_call` = '".$sip_number."' AND `open_profile`='0' AND created_date >= now() - interval 5 minute ORDER BY `id` DESC LIMIT 0,1";
        $AppointmentCheckV = $this->conn->prepare($sql);
        $AppointmentCheckV->execute();
        $num = $AppointmentCheckV->rowCount();
        if($num>0){
            return $AppointmentCheckV->fetch(PDO::FETCH_ASSOC);
        }
        else{
            return 0;
        }

    }
    public function InsertCallFromOpenProfile($cust_or_prof_id,$about,$calldate,$call_duration,$agent_id,$name,$surname,$to,$rconrding,$uuid){
        $resultsss = substr($to, 0, 2);
        if($resultsss == '69'){
            $query = "INSERT INTO `calls`(`cust_or_prof_id`, `about`, `date`, `duration`, `agent_id`, `name`, `surname`, `mobile`, `rconrding`, `datetimeCreated`, `uuid_ivr`) VALUES ('".$cust_or_prof_id."','".$about."','".$calldate."','".$call_duration."','".$agent_id."','".$name."','".$surname."','".$to."','".$rconrding."',CURRENT_TIMESTAMP,'".$uuid."')";
        }
        else{
            $query = "INSERT INTO `calls`(`cust_or_prof_id`, `about`, `date`, `duration`, `agent_id`, `name`, `surname`, `land_line`, `rconrding`, `datetimeCreated`, `uuid_ivr`) VALUES ('".$cust_or_prof_id."','".$about."','".$calldate."','".$call_duration."','".$agent_id."','".$name."','".$surname."','".$to."','".$rconrding."',CURRENT_TIMESTAMP,'".$uuid."')";
        }
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $this->conn->lastInsertId(); 
    }
    public function UpdateCallAnsweredAdminProfile($sip_number){
        $query = "UPDATE `call_answered` SET `open_profile`='1' WHERE `to_call` = '".$sip_number."' AND `open_profile`='0'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
    public function CheckCallDuration(){
        $query = "SELECT `id`,`uuid_ivr` FROM `calls` WHERE `duration` ='0' AND `uuid_ivr`!='' ORDER BY `id` DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
    public function GetCallDurationFormCallCdr($uuid){
        $sql = "SELECT `cdr` FROM `call_cdrs` WHERE `uuid` LIKE '%".$uuid."%'";
        $AppointmentCheckV = $this->conn->prepare($sql);
        $AppointmentCheckV->execute();
        $num = $AppointmentCheckV->rowCount();
        if($num>0){
            $android_row = $AppointmentCheckV->fetch(PDO::FETCH_ASSOC);
            $data = json_decode($android_row['cdr']);

            return $data->variables->billsec;
        }
        else{
            return 0;
        }
    }
     public function UpdateCallDuration($callId,$duration){
        $query = "UPDATE `calls` SET`duration`='".$duration."' WHERE `id`='".$callId."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
    public function GreeceCurrentTime(){
        date_default_timezone_set('Europe/Athens');
        return date("Y-m-d H:i:s");
    }
    public function GetCallOutboundSchedule(){
        $sql = "SELECT `id`, `mobile`, `callTime`, `agent_id` FROM `call_outbound_schedule` WHERE `status`='0' ORDER BY `id` ASC";
        $stmt = $this->conn->prepare($sql);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    public function CheckCallOutboundSchedule($callTime){
        $CurrentTime = $this->GreeceCurrentTime();
        $sql ="SELECT TIMESTAMPDIFF(MINUTE,'".$callTime."','".$CurrentTime."') AS minute";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $num = $stmt->rowCount();
        if($num>0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['minute'];
        }
        else{
            return '';
        }
    }
    public function UpdateCallOutboundSchedule($id){
        $query = "UPDATE `call_outbound_schedule` SET`status`='1' WHERE `id`='".$id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
    }
    
}
?>