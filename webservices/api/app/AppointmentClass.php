<?php
class AppointmentClass{

    // database connection and table name
    private $conn;

    // object properties
    public $id;
    public $date;
    public $time;
    public $name;
    public $surname;
    public $county_name;
    public $address;

    public function __construct($db){
        $this->conn = $db;
    }
    // Appoinments List
    public function GetAppoinments($member_id,$page,$status){
        $limit = "limit ".(10 * $page).", 10";
        $sql ="SELECT `appointments`.`id`,`appointments`.`date`,`appointments`.`time`,`appointments`.`address`,`customers`.`first_name`,`customers`.`last_name`,`customers_contact_details`.`country_id` FROM `appointments` JOIN `customers` on `customers`.`id` = `appointments`.`cust_member_id` JOIN `customers_contact_details` on `customers_contact_details`.`customer_id` = `appointments`.`cust_member_id`  WHERE `appointments`.`prof_member_id` = '".$member_id."' and `appointments`.`status`='".$status."'";
        $sql .= " ORDER BY  `appointments`.`date` DESC ,`appointments`.`time` DESC ".$limit;

        // prepare query statement
        $stmt = $this->conn->prepare($sql);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Appoinments Details
    public function GetAppoinmentsDetails($id){
        $sql ="SELECT `appointments`.`id`,`appointments`.`cust_member_id`,`appointments`.`date`,`appointments`.`time`,`appointments`.`application_id`,`customers`.`first_name`,`customers`.`last_name`,`appointments`.`address`,`appointments`.`budget`,`appointments`.`commision`,`appointments`.`comment`,`appointments`.`status`,`customers_contact_details`.`country_id`,`admin`.`first_name` AS `afname`,`admin`.`last_name` AS `alname` FROM `appointments` JOIN `customers` on `customers`.`id` = `appointments`.`cust_member_id`  JOIN `customers_contact_details` on `customers_contact_details`.`customer_id` = `appointments`.`cust_member_id` JOIN `admin` on `admin`.`id` = `appointments`.`agent_id` WHERE `appointments`.`id` = '".$id."'";
        $sql .= " ORDER BY  `appointments`.`date` DESC ,`appointments`.`time` DESC ".$limit;

        // prepare query statement
        $stmt = $this->conn->prepare($sql);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    
    public function getCountryNameByID($id){
        $query = "SELECT `county_name` FROM `counties` WHERE `id` ='".$id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        if ($stmt -> rowCount() > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row['county_name'];
        }
        else{
            return '';
        }
    }
    public function getCustomersContactDetails($id){
        $query = "SELECT `phone`, `mobile` FROM `customers_contact_details` WHERE `customer_id` ='".$id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        if ($stmt -> rowCount() > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }
        else{
            return '';
        }
    }
    public function getCustomersAccountInfo($id){
        $query = "SELECT `email` FROM `customers_account_info` WHERE `customer_id` ='".$id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        if ($stmt -> rowCount() > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row['email'];
        }
        else{
            return '';
        }
    }
    public function getCategoriesName($id){
        $query = "SELECT `categories`.`name` FROM `applications` JOIN `categories` on `categories`.`id` = `applications`.`category_id` WHERE `applications`.`id`='".$id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        if ($stmt -> rowCount() > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row['name'];
        }
        else{
            return '';
        }
    }
    public function GetCommission($appointment_id){

        $query = "SELECT `appointments`.`id`,`appointments`.`application_id`,`applications`.`category_id`,`categories`.`commissionRate` FROM `appointments` JOIN `applications` ON `applications`.`id` = `appointments`.`application_id`  JOIN `categories` ON `categories`.`id` = `applications`.`category_id` WHERE `appointments`.`id`='".$appointment_id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        if ($stmt -> rowCount() > 0){

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row['commissionRate'];
        }
        else{
            return '';
        }
    }
    public function UpdateBudgetOfAppoinmentd($commissionRate,$appointment_id,$budget){

        $query = "UPDATE `appointments` SET `budget`='".$budget."',`commision`='".$commissionRate."' WHERE `id`='".$appointment_id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
    }
    public function GetProfessionalsCategory($member_id){
        $sql ="SELECT `professional_id`,`category_id` FROM `professionals_applications` WHERE `professional_id`='".$member_id."' AND `status`='Active' GROUP BY `category_id` ORDER BY `category_id` DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($sql);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    public function GetCategoryHelp($category_id){
       $sql ="SELECT `id`,`name`,`help` FROM `categories` WHERE `id` = '".$category_id."' AND `help` IS NOT NULL ORDER BY `sequence` ASC";

        // prepare query statement
        $customerName = $this->conn->prepare($sql);

        // execute query
        $customerName->execute();

        return $customerName;
    }
    public function CheckApplicationExist($category_id){
       $sql ="SELECT `id`, `category_id` FROM `help` WHERE `category_id` = '".$category_id."' AND `help` IS NOT NULL  ORDER BY `id` DESC";

        // prepare query statement
        $CheckApplicationExist = $this->conn->prepare($sql);

        // execute query
        $CheckApplicationExist->execute();

        return $CheckApplicationExist;
    }
    public function GetApplicationsHelp($category_id){
       $sql ="SELECT `id`, `category_id`, `name`, `help` FROM `help` WHERE `category_id` = '".$category_id."' AND `help` IS NOT NULL ORDER BY `id` DESC";

        // prepare query statement
        $customerName = $this->conn->prepare($sql);

        // execute query
        $customerName->execute();

        return $customerName;
    }
    
     public function UpdateCommentOfAppoinmentd($comment,$appointment_id){

        $query = "UPDATE `appointments` SET `comment`='".$comment."' WHERE `id`='".$appointment_id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
    }

    public function UpdateDateTimeOfAppoinment($id,$date,$time,$date_old,$time_old){
/*UPDATE `appointments` SET `date`='".$date."',`time`='".$time."',`date_old`='".$_REQUEST['date_old']."',`time_old`='".$_REQUEST['time_old']."',`googleEventId`='".$FinalEventId."' WHERE `id` = '".$_REQUEST['id']."'*/
        $query = "UPDATE `appointments` SET `date`='".$date."',`time`='".$time."',`date_old`='".$date_old."',`time_old`='".$time_old."' WHERE `id`='".$id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
    }
    public function UpdateAppointmentViewedStatus($id,$CDate){

        $query = "UPDATE `appointments` SET `viewed`='Viewed', `viewed_datetime`='".$CDate."' WHERE `id`= '".$id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
    }
    
    public function GetNewProfessionalsAppointment(){
       $sql ="SELECT `id`,`prof_member_id`,`send_noti_status` FROM `appointments` WHERE `status`='1' AND `send_noti_status` = '0' ORDER BY `id` DESC LIMIT 0,1";

        // prepare query statement
        $CheckApplicationExist = $this->conn->prepare($sql);

        // execute query
        $CheckApplicationExist->execute();

        return $CheckApplicationExist;
    }
    public function GetProfessionalsDeviceToken($prof_member_id){
         $sql ="SELECT `prof_member_id`, `device_token`, `device_status` FROM `professionals_device_tokens` WHERE `prof_member_id`='".$prof_member_id."' AND `device_token` !=''";

        // prepare query statement
        $ProfExist = $this->conn->prepare($sql);

        // execute query
        $ProfExist->execute();

        return $ProfExist;
    }
    public function UpdateNewAppointmentSentStatus($appointment_id){
        $query = "UPDATE `appointments` SET `send_noti_status`='1' WHERE `id`='".$appointment_id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
    }
    public function GetCancleProfessionalsAppointment(){
       $sql ="SELECT `id`,`prof_member_id`,`date`,`time`,`address`,`send_cancelled_noti_status` FROM `appointments` WHERE `status`='0' AND `send_cancelled_noti_status` = '0' ORDER BY `id` DESC LIMIT 0,1";

        // prepare query statement
        $CheckApplicationExist = $this->conn->prepare($sql);

        // execute query
        $CheckApplicationExist->execute();

        return $CheckApplicationExist;
    }
    public function UpdateCancleAppointmentSentStatus($appointment_id){
        $query = "UPDATE `appointments` SET `send_cancelled_noti_status`='1' WHERE `id`='".$appointment_id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
    }
    
    public function sendPushNotificationToGCM($registatoin_ids, $message){
        define("GOOGLE_API_KEY", "AAAADk2iS0M:APA91bGfCUpKcB2J61IZ3txEbt9_UyInuPTXt0GX4K5o9Uo5yTHpmLH6_v2tIXytn-AQ0fYaiIh5DQeaBEmBqvgJfn3uxjggtUXYFikzxgTaLjEwpLadivvrltOc81uSvC5fc11CMXbf");
        define("GOOGLE_GCM_URL", "https://fcm.googleapis.com/fcm/send");

        $fields = array(

            'to'                        => $registatoin_ids,
            'sound'                     => 'default',
            'priority'                  => "high",
            'data'                      => $message
        );

        $headers = array(
            GOOGLE_GCM_URL,
            'Content-Type: application/json',
            'Authorization: key=' . GOOGLE_API_KEY
        );

        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, GOOGLE_GCM_URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Problem occurred: ' . curl_error($ch));
        }

        curl_close($ch);
        return $result;
        
    }
    function IosSendPushNotification($deviceToken, $message, $appointment_id,$tag) {
        $passphrase = '1234';
        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', 'MyConGrDevCK.pem');
        //stream_context_set_option($ctx, 'ssl', 'local_cert', 'MyConGrDistCK.pem');
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

        // Open a connection to the APNS server
        $fp = stream_socket_client(
            'ssl://gateway.sandbox.push.apple.com:2195', $err,
            //'ssl://gateway.push.apple.com:2195', $err,
            $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

        if (!$fp)
            exit("Failed to connect: $err $errstr" . PHP_EOL);


        // Create the payload body
        $body['aps'] = array(
            'alert' => $message,
            'appointment_id' => $appointment_id,
            'tag' => $tag,
            'sound' => 'default'
            );

        $payload = json_encode($body);

        $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

        $result = fwrite($fp, $msg, strlen($msg));
        fclose($fp);

    }
}
?>