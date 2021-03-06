<?php
class Appointment{
 
    // database connection and table name
    private $conn;
    private $table_name = "appointments";
    private $offer_details = "appointments_offers_details";
    private $application_table_name = "applications";
    private $ratings_table_name = "directory_ratings";
    private $customers_table_name = "customers";
    private $professional_table_name = "professionals";
    private $admin_table_name = "admin";
    private $customers_contact_table_name = "customers_contact_details";
    private $customers_account_table_name = "customers_account_info";
 
    // object properties
    public $id;
    public $prof_member_id;
    public $cust_member_id;
    public $application_id;
    public $county_id;
    public $date;
    public $time;
    public $address;
    public $budget;
    public $commision;
    public $agent_id;
    public $comment;
    public $sms;
    public $sms_log_id;
    public $datetimeCreated;
    public $datetimeStatusUpdated;
    public $sourceAppointmentId;
    public $status;
    public $cancelComment;
    public $customer_first_name;
    public $customer_last_name;
    public $category_id;
    public $viewed;
    public $viewed_datetime;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    public function read(){
        //select all data
        $query = "SELECT
                    `id`, `prof_member_id`, `cust_member_id`, `application_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelComment`
                FROM
                    " . $this->table_name . "
                ORDER BY
                    id ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    function readOne(){
     
        // query to read single record
        $query = "SELECT
                    a.`id`, a.`prof_member_id`, a.`cust_member_id`, a.`application_id`,a.`county_id`, a.`date`, a.`time`, a.`address`,a.`delivery_address`, a.`budget`, a.`commision`, a.`agent_id`, a.`comment`, a.`sms`, a.`sms_log_id`,  a.`datetimeCreated`, a.`datetimeStatusUpdated`, a.`sourceAppointmentId`, a.`status`, a.`cancelComment`, ap.`category_id`, p.`first_name` as professional_first_name, p.`last_name` as professional_last_name, ac.`first_name` as customer_first_name, ac.`last_name` as customer_last_name, ac.`sex` as customer_sex, cc.`address` as customer_address, cc.`phone` as customer_phone, cc.`mobile` as customer_mobile, ca.`email` as customer_email, a.`transport_details`
                FROM
                    " . $this->table_name . " a
                LEFT JOIN ". $this->application_table_name." ap 
                    ON a.application_id = ap.id
                LEFT JOIN ". $this->customers_table_name." ac 
                    ON a.cust_member_id = ac.id
                LEFT JOIN ". $this->professional_table_name." p 
                    ON a.prof_member_id = p.id    
                LEFT JOIN ". $this->customers_contact_table_name." cc 
                    ON a.cust_member_id = cc.customer_id
                LEFT JOIN ". $this->customers_account_table_name." ca 
                    ON a.cust_member_id = ca.customer_id
                WHERE
                    a.id = :id
                LIMIT
                    0,1";
     
     //echo $query;
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
     //echo $this->id." ------ ";

     $cur_id = $this->id;
        // bind id of product to be updated
        $stmt->bindParam(':id',  $cur_id, PDO::PARAM_INT);
        //$stmt->bindValue(':id', '$cur_id', PDO::PARAM_STR);
     
        // execute query
        $stmt->execute();

        $num = $stmt->rowCount();
     
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        // set values to object properties
        $this->prof_member_id = $row['prof_member_id'];
        $this->cust_member_id = $row['cust_member_id'];
        $this->application_id = $row['application_id'];
        $this->county_id = $row['county_id'];
        $this->date = $row['date'];
        $this->time = $row['time'];
        $this->address = $row['address'];
        $this->delivery_address = $row['delivery_address'];
        $this->budget = $row['budget'];
        $this->commision =$row['commision'];
        $this->agent_id = $row['agent_id'];
        $this->comment = $row['comment'];
        $this->sms = $row['sms'];
        $this->sms_log_id = $row['sms_log_id'];
        $this->datetimeCreated = $row['datetimeCreated'];
        $this->datetimeStatusUpdated = $row['datetimeStatusUpdated'];
        $this->sourceAppointmentId = $row['sourceAppointmentId'];
        $this->status = $row['status'];
        $this->cancelComment = $row['cancelComment'];
        $this->category_id = $row['category_id'];
        $this->customer_first_name = $row['customer_first_name'];
        $this->customer_last_name = $row['customer_last_name'];
        $this->customer_sex = $row['customer_sex'];
        $this->customer_address = $row['customer_address'];
        $this->customer_phone = $row['customer_phone'];
        $this->customer_mobile = $row['customer_mobile'];
        $this->customer_email = $row['customer_email'];
        $this->transport_details = $row['transport_details'];
        $this->professional_first_name = $row['professional_first_name'];
        $this->professional_last_name = $row['professional_last_name'];

    } // Read One

    function cancelAppointment($cancelReason = NULL, $cancelComment = NULL){

        if(@$cancelReason){

        }else{
            $cancelReason = 0;
        }

        if(@$cancelComment){

        }else{
            $cancelComment = "";
        }

        // query to read single record
        $query = "UPDATE " . $this->table_name . "
                    SET
                    `status`=0, `cancelReason`= :cancelReason, `cancelComment`= :cancelComment ,`datetimeStatusUpdated` ='".date('Y-m-d H:i:s')."'
                WHERE
                    id = :id";
     
        $stmt = $this->conn->prepare( $query );
     
        $cur_id = $this->id;
        // bind id of product to be updated
        $stmt->bindParam(':id',  $cur_id, PDO::PARAM_INT);
        $stmt->bindParam(':cancelReason',  $cancelReason, PDO::PARAM_INT);
        $stmt->bindParam(':cancelComment',  $cancelComment);

        if ($stmt->execute()) { 
            
           return 1;
        } else {
            
           return 0;
        }
    } // CancelAppointment

    function updateCloseTimes($id, $close_times){


        // query to read single record
        $query = "INSERT INTO `appointments_offers_details`(`appointment_id`, `close_times`) 
                    VALUES ('$id','$close_times')
                    ON DUPLICATE KEY UPDATE `close_times`='$close_times'";
     
        $stmt = $this->conn->prepare( $query );

        if ($stmt->execute()) { 
            
           return 1;
        } else {
            
           return 0;
        }
    } // CancelAppointment

    // read products with pagination
    public function readPaging($from_record_num, $records_per_page){
     
        // select query
        $query = "SELECT
                    `id`, `prof_member_id`, `cust_member_id`, `application_id`, `county_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelReason`, `cancelComment`, `viewed`, `viewed_datetime`
                FROM
                    " . $this->table_name . " WHERE `status` NOT IN ('2','3')
                ORDER BY `datetimeCreated` DESC
                LIMIT ?, ?";
     
        // prepare query statement

        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

        // read products with pagination
    public function readPagingOffers($from_record_num, $records_per_page){
     
        // select query
        $query = "SELECT
                    `id`, `prof_member_id`, `cust_member_id`, `application_id`, `county_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelReason`, `cancelComment`, `viewed`, `viewed_datetime`
                FROM
                    " . $this->table_name . " WHERE `status`=3
                ORDER BY `datetimeCreated` DESC
                LIMIT ?, ?";
     
        // prepare query statement

        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    // read products with pagination
    public function readRejectPaging($from_record_num, $records_per_page){
         $time = date('Y-m-d H:i:s',strtotime("-48 hours"));

        // select query
        $query = "SELECT
                    `id`, `prof_member_id`, `cust_member_id`, `application_id`, `county_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelReason`, `cancelComment`, `viewed`, `viewed_datetime`
                FROM
                    " . $this->table_name . " WHERE `cancelReason` = '4' and `datetimeStatusUpdated` >= '".$time."'
                ORDER BY `reject_datetime` DESC
                LIMIT ?, ?";
     
        // prepare query statement

        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    public function readCancelPaging($from_record_num, $records_per_page){
         $time = date('Y-m-d');

        // select query
        $query = "SELECT
                    `id`, `prof_member_id`, `cust_member_id`, `application_id`, `county_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelReason`, `cancelComment`, `viewed`, `viewed_datetime`
                FROM
                    " . $this->table_name . " WHERE `status` = '0' 
                ORDER BY `reject_datetime` DESC
                LIMIT ?, ?";
     
        // prepare query statement

        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    public function getAppointnmentsByProf($prof_id, $status){
        // select query
        $query = "SELECT
                    a.`id`, a.`prof_member_id`, a.`cust_member_id`, a.`application_id`, a.`county_id`, a.`date`, a.`time`, a.`address`, a.`budget`, a.`commision`, a.`agent_id`, a.`comment`, a.`sms`, a.`sms_log_id`, a.`datetimeCreated`, a.`datetimeStatusUpdated`, a.`sourceAppointmentId`, a.`status`, a.`cancelReason`, a.`cancelComment`, ao.`close_times`
                FROM
                    " . $this->table_name . " a
                LEFT JOIN ".$this->offer_details ." ao ON a.`id`=ao.`appointment_id`
                WHERE `status` LIKE '%$status%' AND `prof_member_id` = '$prof_id'
                ORDER BY `datetimeCreated` DESC";
         $stmt = $this->conn->prepare( $query );
    

        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    // read products with pagination for Customer
    public function readPagingByCust($from_record_num, $records_per_page, $cust_id){
     
        // select query
        $query = "SELECT
                    `id`, `prof_member_id`, `cust_member_id`, `application_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelReason`, `cancelComment`, `viewed`, `viewed_datetime`
                FROM
                    " . $this->table_name . " WHERE `cust_member_id`= ? AND (`status`=1 OR `status`=0)
                ORDER BY `datetimeCreated` DESC
                LIMIT ?, ?";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $cust_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

        // read products with pagination for Customer
    public function readPagingOffersByCust($from_record_num, $records_per_page, $cust_id){
     
        // select query
        $query = "SELECT
                    `id`, `prof_member_id`, `cust_member_id`, `application_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelReason`, `cancelComment`, `viewed`, `viewed_datetime`
                FROM
                    " . $this->table_name . " WHERE `cust_member_id`= ? AND `status`=3
                ORDER BY `datetimeCreated` DESC
                LIMIT ?, ?";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $cust_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    // read products with pagination for Customer
    public function readPagingByProf($from_record_num, $records_per_page, $prof_id){
     
        // select query
        $query = "SELECT
                    `id`, `prof_member_id`, `cust_member_id`, `application_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`,  `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelReason`, `cancelComment`, `viewed`, `viewed_datetime`
                FROM
                    " . $this->table_name . " WHERE `prof_member_id`= ? AND (`status`=1 OR `status`=0)
                ORDER BY `datetimeCreated` DESC
                LIMIT ?, ?";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $prof_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    public function readPagingByProfLatest($from_record_num, $records_per_page, $prof_id){

        // select query
        $query = "SELECT
                    a.`id`, a.`prof_member_id`, a.`cust_member_id`, a.`application_id`, a.`date`, a.`time`, a.`address`, a.`budget`, a.`commision`, a.`agent_id`, a.`comment`, a.`sms`, a.`sms_log_id`,  a.`datetimeCreated`, a.`datetimeStatusUpdated`, a.`sourceAppointmentId`, a.`status`, a.`cancelReason`, a.`cancelComment`,  a.`viewed`,  a.`viewed_datetime`, ap.`category_id` 
                FROM " . $this->table_name . " a 
                JOIN ". $this->application_table_name." ap ON a.application_id = ap.id
                WHERE a.`prof_member_id`= ? AND a.`status`=1 AND a.`date` >= '".date('Y-m-d')."' ORDER BY a.`date`, a.`time`
                LIMIT ?, ?";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $prof_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    // read products with pagination for Agent
    public function readPagingByAgent($from_record_num, $records_per_page, $agent_id){
     
        // select query
        $query = "SELECT
                    a.`id`, a.`prof_member_id`, a.`cust_member_id`, ap.`category_id`, a.`application_id`, a.`date`, a.`time`, a.`address`, a.`budget`, a.`commision`, a.`agent_id`, a.`comment`, a.`sms`, a.`sms_log_id`, a.`datetimeCreated`, a.`datetimeStatusUpdated`, a.`sourceAppointmentId`, a.`status`, a.`cancelReason`, a.`cancelComment`, a.`viewed`, a.`viewed_datetime`
                FROM
                    " . $this->table_name . " a 
                    LEFT JOIN ". $this->application_table_name." ap
                    ON a.application_id = ap.id WHERE a.`agent_id`= ? And a.`date` < '" .date("Y-m-d")."'  AND a.`status`= 1 and a.`id` NOT IN (SELECT appointment_id FROM `directory_ratings` WHERE appointment_id >=1) 
                ORDER BY a.`datetimeCreated` DESC
                LIMIT ?, ?";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $agent_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }
    // used for paging products
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . " WHERE `status` NOT IN ('2','3')";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }
    public function countOffers(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . " where status = 3";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }

    public function countAgent($agent_id){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . " where agent_id = '".$agent_id."'";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }
    public function countProf($prof_id){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . " where prof_member_id = '".$prof_id."'";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }
    public function countProfLatest($prof_id){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . " where prof_member_id = '".$prof_id."' AND `status`=1 AND `date` >= '".date('Y-m-d')."' ORDER BY `date`, `time`";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }
    public function countCust($cust_id){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . " where cust_member_id = '".$cust_id."'";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }
    public function countOffersCust($cust_id){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . " where cust_member_id = '".$cust_id."' and status='3'";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }

    public function getProfessionalNameByID($id){
        $query = "SELECT first_name, last_name FROM professionals WHERE `id`=".$id."";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['first_name']." ".$row['last_name'];
    }

    public function getCustomerNameByID($id){
        $query = "SELECT first_name, last_name FROM customers WHERE `id`=".$id."";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['first_name']." ".$row['last_name'];
    }

    public function getCustomerMobileByID($id){
        $query = "SELECT mobile FROM customers_contact_details WHERE `customer_id`=".$id."";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['mobile'];
    }

    public function getAgentNameByID($id){
        $query = "SELECT first_name, last_name FROM admin WHERE `id`=".$id."";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['first_name']." ".$row['last_name'];
    }
    public function getCategoryByID($id){
        $query = "SELECT * FROM categories WHERE `id`=".$id."";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row;
    }

    public function create($prof_id, $cust_id, $application_id, $county_id, $date, $time, $address, $budget, $commision, $agent_id, $comment, $status, $delivery_address = NULL){

        $now = date('Y-m-d H:i:s');        

        $query = "INSERT INTO `appointments`(`prof_member_id`, `cust_member_id`, `application_id`,`county_id`,  `date`, `time`, `address`,`delivery_address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelComment`) VALUES ('$prof_id', '$cust_id', '$application_id','$county_id', '$date', '$time', '$address', '$delivery_address', '$budget','$commision', '$agent_id','$comment','0','0', '$now','$now','0','$status','')";
        //echo $query;

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        //return "INSERT INTO `appointments`(`prof_member_id`, `cust_member_id`, `application_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `googleEventId`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelComment`) VALUES ('$prof_id', '$cust_id', '$application_id', '$date', '$time', '$address', '$budget','$commision', 'agent_id','comment','0','0','0', NOW(),NOW(),'0','0','')";
        return "1";
    }


    public function updateAppointment($appointment_id, $cust_id, $category_id, $application_id, $address, $delivery_address, $budget, $county_id, $commision, $agent_id, $comment, $status, $selected_date, $selected_time, $prof_id){

        $now = date('Y-m-d H:i:s');        

        $query = "UPDATE `appointments` SET  `prof_member_id`='". $prof_id."', `cust_member_id`= '".$cust_id."', `application_id`='".$application_id."', `county_id`='".$county_id."', `date`= '".$selected_date."', `time`= '".$selected_time."', `address`= '".$address."', `delivery_address`= '".$delivery_address."', `budget`= '".$budget."', `commision`= '".$commision."', `comment`= '".$comment."', `datetimeStatusUpdated`= '".date('Y-m-d H:i:s')."', `status`= '".$status."'  WHERE id = '".$appointment_id."'";
        //echo $query;

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

      
        return "1";
    }



      public function createTransportOffer($prof_id, $cust_id, $application_id, $county_id, $date, $time, $address, $budget, $commision, $agent_id, $comment, $status, $delivery_address, $htmlTransport){
        $query = "INSERT INTO `appointments`(`prof_member_id`, `cust_member_id`, `application_id`,`county_id`,  `date`, `time`, `address`,`delivery_address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelComment`,`transport_details`) VALUES ('$prof_id', '$cust_id', '$application_id','$county_id', '$date', '$time', '$address', '$delivery_address', '$budget','$commision', '$agent_id','$comment','0','0', NOW(),NOW(),'0','$status','','$htmlTransport')";
        //echo $query;

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        //return "INSERT INTO `appointments`(`prof_member_id`, `cust_member_id`, `application_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `googleEventId`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelComment`) VALUES ('$prof_id', '$cust_id', '$application_id', '$date', '$time', '$address', '$budget','$commision', 'agent_id','comment','0','0','0', NOW(),NOW(),'0','0','')";
        return "1";
    }

    public function rejectByProf($id, $prof_member_id){


        //var getAvailableAPI = API_LOCATION+'professional/getCalendarForBooking.php?duration='+duration+'&county_id='+county+'&application_id='+application+'&startDate='+startDate+'&endDate='+endDate+'&address='+address;
    }

    function getStatusInfo(){

        $query = "SELECT * FROM `appointments_status` WHERE `ID` = :id ";
        $stmt = $this->conn->prepare( $query );
        $status_id = $this->status;
        $stmt->bindParam(':id',  $status_id, PDO::PARAM_INT);

        $stmt->execute();
        //$row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $stmt;

    }

    public function getStatusName($id){

        $query = "SELECT `NAME` FROM `appointments_status` WHERE `ID` = $id ";
        $stmt = $this->conn->prepare( $query );

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['NAME'];
    }


    public function checkprofsms($prof_id){
        $query = "SELECT `defaultsms` FROM `professionals` WHERE `id` = $prof_id ";
        $stmt = $this->conn->prepare( $query );

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['defaultsms'];
    }


    public function commision($date){
        $query = "SELECT sum(`commision`) as commision FROM  `appointments` WHERE  `datetimeCreated` LIKE  '%".$date."%' and `status` ='1'";
        $stmt = $this->conn->prepare( $query );

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;

    }


    public function rejectCount(){

        $time = date('Y-m-d H:i:s',strtotime("-48 hours"));

        $query = "SELECT Count(`id`) as total FROM  `appointments` WHERE  `cancelReason` = '4' and datetimeStatusUpdated >= '".$time."'";
        $stmt = $this->conn->prepare( $query );

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row; 
    }

    public function cancelCount(){

        $time = date('Y-m-d');

        $query = "SELECT Count(`id`) as total FROM  `appointments` WHERE  `status` = '0' and datetimeStatusUpdated like '%".$time."%'";
        $stmt = $this->conn->prepare( $query );

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row; 
    }

        public function rejectpopups($agent_id){

        $time = date('Y-m-d H:i:s',strtotime("-48 hours"));
        $aids = array();
        $aquery = "Select appointment_id from agent_reject_view where agent_id='".$agent_id."'";
        $astmt = $this->conn->prepare( $aquery );
        $astmt->execute();

        $num = $astmt->rowCount();
        if($num > 0){
            
            while ($arow = $astmt->fetch(PDO::FETCH_ASSOC)){
                $aids[] = $arow['appointment_id'];
            }
        }
        

        // select query
        $query = "SELECT a.`id`, a.`prof_member_id`, a.`date`, a.`time`, a.`cancelComment`, a.`application_id`, ap.`category_id`, p.`first_name`, p.`last_name` 
                FROM " . $this->table_name . " a
                Join professionals p on a.prof_member_id = p.id 
                LEFT JOIN ". $this->application_table_name." ap
                    ON a.application_id = ap.id
                WHERE a.`cancelReason` = '4' and a.`datetimeStatusUpdated` >= '".$time."' and a.`id` Not IN ('".implode("','", $aids)."')
                ORDER BY a.`reject_datetime` DESC limit 1";
        

        $stmt = $this->conn->prepare( $query );

        $stmt->execute();

        $num = $stmt->rowCount();

        if($num > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $appointment_id = $row['id'];
            // // Add in view list
            $iquery = "INSERT INTO `agent_reject_view` (`agent_id`, `appointment_id`)  VALUES ('$agent_id', '$appointment_id')";
         
            $istmt = $this->conn->prepare( $iquery );
            $istmt->execute();

            return $row;
        }else{
            return 0;
        }
        
        
        
        
           
    }

    public function searchList($prof_name, $cus_name, $cus_mobile, $cus_address, $from_record_num, $records_per_page){
     
        // select query
        $query = "SELECT
                    `id`, `prof_member_id`, `cust_member_id`, `application_id`, `county_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelReason`, `cancelComment`, `viewed`, `viewed_datetime`
                FROM
                    " . $this->table_name . " WHERE `status` NOT IN ('2','3') ";

        $cust_ids = array();

        if(@$prof_name){

            $pname = explode("|||", $prof_name);
            
            $pquery = "Select id from professionals where first_name like '%".$pname[0]."%' OR last_name like '%".$pname[0]."%'";

            $pstmt = $this->conn->prepare($pquery);

            $pstmt->execute();

            $pnum = $pstmt->rowCount();

            if($pnum > 0){
                $prof_ids = array();
                while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                    $prof_ids[] = $row['id'];
                }
                
                $query .= " and prof_member_id IN ('".implode("','", $prof_ids)."')";    
            }

            //die("d");

        }
        if((@$cus_name) || (@$cus_mobile) || (@$cus_address)){

            if(@$cus_name){
                $pname = explode("|||", $cus_name);
                $pquery = "Select id from customers where first_name like '%".$pname[0]."%' OR last_name like '%".$pname[0]."%'";

                $pstmt = $this->conn->prepare($pquery);

                $pstmt->execute();

                $pnum = $pstmt->rowCount();

                if($pnum > 0){
                    $cust_ids = array();
                    while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                        $cust_ids[] = $row['id'];
                    }
                    
                       
                }   
            }
            if(@$cus_mobile){

            
                $pquery = "Select customer_id from customers_contact_details where mobile ='".$cus_mobile."' ";

                if(@$cust_ids){
                    $pquery .=  " and customer_id IN ('".implode("','", $cust_ids)."')"; 
                }

                $pstmt = $this->conn->prepare($pquery);

                $pstmt->execute();

                $pnum = $pstmt->rowCount();

                if($pnum > 0){
                    $cust_ids = array();
                    while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                        $cust_ids[] = $row['customer_id'];
                    }
                       
                }

            }
            if(@$cus_address){

            
                $pquery = "Select customer_id from customers_contact_details where address like '%".str_replace('|||', " ", $cus_address)."%' ";

                if(@$cust_ids){
                    $pquery .=  " and customer_id IN ('".implode("','", $cust_ids)."')"; 
                }


                $pstmt = $this->conn->prepare($pquery);

                $pstmt->execute();

                $pnum = $pstmt->rowCount();

                if($pnum > 0){
                    $cust_ids = array();
                    while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                        $cust_ids[] = $row['customer_id'];
                    }
                       
                }

            }


            $query .= " and cust_member_id IN ('".implode("','", $cust_ids)."')"; 
            

            //die("d");

        }



       $query .= " ORDER BY `datetimeCreated` DESC LIMIT ?, ?";
        
        // prepare query statement

        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }
    public function searchListCount($prof_name, $cus_name, $cus_mobile, $cus_address){
     
        // select query
        $query = "SELECT
                    COUNT(*) as total_rows
                FROM
                    " . $this->table_name . " WHERE `status` NOT IN ('2','3') ";

        $cust_ids = array();

        if(@$prof_name){

            $pname = explode(" ", $prof_name);
            
            $pquery = "Select id from professionals where first_name like '%".$pname[0]."%' OR last_name like '%".$pname[0]."%'";

            $pstmt = $this->conn->prepare($pquery);

            $pstmt->execute();

            $pnum = $pstmt->rowCount();

            if($pnum > 0){
                $prof_ids = array();
                while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                    $prof_ids[] = $row['id'];
                }
                
                $query .= " and prof_member_id IN ('".implode("','", $prof_ids)."')";    
            }

            //die("d");

        }
        if((@$cus_name) || (@$cus_mobile) || (@$cus_address)){

            if(@$cus_name){
                $pname = explode(" ", $cus_name);
                $pquery = "Select id from customers where first_name like '%".$pname[0]."%' OR last_name like '%".$pname[0]."%'";

                $pstmt = $this->conn->prepare($pquery);

                $pstmt->execute();

                $pnum = $pstmt->rowCount();

                if($pnum > 0){
                    $cust_ids = array();
                    while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                        $cust_ids[] = $row['id'];
                    }
                    
                       
                }   
            }
            if(@$cus_mobile){

            
                $pquery = "Select customer_id from customers_contact_details where mobile ='".$cus_mobile."' ";

                if(@$cust_ids){
                    $pquery .=  " and customer_id IN ('".implode("','", $cust_ids)."')"; 
                }

                $pstmt = $this->conn->prepare($pquery);

                $pstmt->execute();

                $pnum = $pstmt->rowCount();

                if($pnum > 0){
                    $cust_ids = array();
                    while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                        $cust_ids[] = $row['customer_id'];
                    }
                       
                }

            }
            if(@$cus_address){

            
                $pquery = "Select customer_id from customers_contact_details where address like '%".str_replace('|||', " ", $cus_address)."%' ";

                if(@$cust_ids){
                    $pquery .=  " and customer_id IN ('".implode("','", $cust_ids)."')"; 
                }

                $pstmt = $this->conn->prepare($pquery);

                $pstmt->execute();

                $pnum = $pstmt->rowCount();

                if($pnum > 0){
                    $cust_ids = array();
                    while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                        $cust_ids[] = $row['customer_id'];
                    }
                       
                }

            }


            $query .= " and cust_member_id IN ('".implode("','", $cust_ids)."')"; 
            

            //die("d");

        }



       $query .= " ORDER BY `datetimeCreated` DESC ";
        
        // prepare query statement

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }

    public function searchListOffers($prof_name, $cus_name, $cus_mobile, $cus_address, $from_record_num, $records_per_page){
     
        // select query
        $query = "SELECT
                    `id`, `prof_member_id`, `cust_member_id`, `application_id`, `county_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelReason`, `cancelComment`, `viewed`, `viewed_datetime`
                FROM
                    " . $this->table_name . " WHERE `status` = '3' ";

        $cust_ids = array();

        if(@$prof_name){

            $pname = explode("|||", $prof_name);
            
            $pquery = "Select id from professionals where first_name like '%".$pname[0]."%' OR last_name like '%".$pname[0]."%'";

            $pstmt = $this->conn->prepare($pquery);

            $pstmt->execute();

            $pnum = $pstmt->rowCount();

            if($pnum > 0){
                $prof_ids = array();
                while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                    $prof_ids[] = $row['id'];
                }
                
                $query .= " and prof_member_id IN ('".implode("','", $prof_ids)."')";    
            }

            //die("d");

        }
        if((@$cus_name) || (@$cus_mobile) || (@$cus_address)){

            if(@$cus_name){
                $pname = explode("|||", $cus_name);
                $pquery = "Select id from customers where first_name like '%".$pname[0]."%' OR last_name like '%".$pname[0]."%'";

                $pstmt = $this->conn->prepare($pquery);

                $pstmt->execute();

                $pnum = $pstmt->rowCount();

                if($pnum > 0){
                    $cust_ids = array();
                    while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                        $cust_ids[] = $row['id'];
                    }
                    
                       
                }   
            }
            if(@$cus_mobile){

            
                $pquery = "Select customer_id from customers_contact_details where mobile ='".$cus_mobile."' ";

                if(@$cust_ids){
                    $pquery .=  " and customer_id IN ('".implode("','", $cust_ids)."')"; 
                }

                $pstmt = $this->conn->prepare($pquery);

                $pstmt->execute();

                $pnum = $pstmt->rowCount();

                if($pnum > 0){
                    $cust_ids = array();
                    while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                        $cust_ids[] = $row['customer_id'];
                    }
                       
                }

            }
            if(@$cus_address){

            
                $pquery = "Select customer_id from customers_contact_details where address like '%".str_replace('|||', " ", $cus_address)."%' ";

                if(@$cust_ids){
                    $pquery .=  " and customer_id IN ('".implode("','", $cust_ids)."')"; 
                }


                $pstmt = $this->conn->prepare($pquery);

                $pstmt->execute();

                $pnum = $pstmt->rowCount();

                if($pnum > 0){
                    $cust_ids = array();
                    while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                        $cust_ids[] = $row['customer_id'];
                    }
                       
                }

            }


            $query .= " and cust_member_id IN ('".implode("','", $cust_ids)."')"; 
            

            //die("d");

        }



       $query .= " ORDER BY `datetimeCreated` DESC LIMIT ?, ?";
        
        // prepare query statement

        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }
    public function searchListOffersCount($prof_name, $cus_name, $cus_mobile, $cus_address){
     
        // select query
        $query = "SELECT
                    COUNT(*) as total_rows
                FROM
                    " . $this->table_name . " WHERE `status` = '3' ";

        $cust_ids = array();

        if(@$prof_name){

            $pname = explode(" ", $prof_name);
            
            $pquery = "Select id from professionals where first_name like '%".$pname[0]."%' OR last_name like '%".$pname[0]."%'";

            $pstmt = $this->conn->prepare($pquery);

            $pstmt->execute();

            $pnum = $pstmt->rowCount();

            if($pnum > 0){
                $prof_ids = array();
                while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                    $prof_ids[] = $row['id'];
                }
                
                $query .= " and prof_member_id IN ('".implode("','", $prof_ids)."')";    
            }

            //die("d");

        }
        if((@$cus_name) || (@$cus_mobile) || (@$cus_address)){

            if(@$cus_name){
                $pname = explode(" ", $cus_name);
                $pquery = "Select id from customers where first_name like '%".$pname[0]."%' OR last_name like '%".$pname[0]."%'";

                $pstmt = $this->conn->prepare($pquery);

                $pstmt->execute();

                $pnum = $pstmt->rowCount();

                if($pnum > 0){
                    $cust_ids = array();
                    while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                        $cust_ids[] = $row['id'];
                    }
                    
                       
                }   
            }
            if(@$cus_mobile){

            
                $pquery = "Select customer_id from customers_contact_details where mobile ='".$cus_mobile."' ";

                if(@$cust_ids){
                    $pquery .=  " and customer_id IN ('".implode("','", $cust_ids)."')"; 
                }

                $pstmt = $this->conn->prepare($pquery);

                $pstmt->execute();

                $pnum = $pstmt->rowCount();

                if($pnum > 0){
                    $cust_ids = array();
                    while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                        $cust_ids[] = $row['customer_id'];
                    }
                       
                }

            }
            if(@$cus_address){

            
                $pquery = "Select customer_id from customers_contact_details where address like '%".str_replace('|||', " ", $cus_address)."%' ";

                if(@$cust_ids){
                    $pquery .=  " and customer_id IN ('".implode("','", $cust_ids)."')"; 
                }

                $pstmt = $this->conn->prepare($pquery);

                $pstmt->execute();

                $pnum = $pstmt->rowCount();

                if($pnum > 0){
                    $cust_ids = array();
                    while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)){
                        $cust_ids[] = $row['customer_id'];
                    }
                       
                }

            }


            $query .= " and cust_member_id IN ('".implode("','", $cust_ids)."')"; 
            

            //die("d");

        }



       $query .= " ORDER BY `datetimeCreated` DESC ";
        
        // prepare query statement

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }
    


}
?>