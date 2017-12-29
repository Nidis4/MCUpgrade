<?php
class Professional{
 
    // database connection and table name
    private $conn;
    private $table_name = "professionals";
    private $contact_table_name = "professionals_contact_details";
    private $account_table_name = "professionals_account_info";
    private $counties_table_name = "professionals_counties";
    private $applications_table_name = "professionals_applications";
 
    // object properties
    public $professional_id;
    public $address;
    public $area;
    public $city;
    public $country_id;
    public $latitude;
    public $longtitude;
    public $mobile;
    public $phone;
    public $postcode;
    public $county_id;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    public function contactDetails(){
        //select all data
        $query = "SELECT
                    `professional_id`, `address`, `area`, `city`, `country_id`, `latitude`, `longtitude`, `postcode`, `phone`, `mobile`
                FROM
                    " . $this->contact_table_name . "
                ORDER BY
                    id ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    public function accountInfo(){
        //select all data
        $query = "SELECT
                    `professional_id`, `email`, `password`, `last_login`, `last_login_ip`, `modified`, `status`, `user_type`, `created`
                FROM
                    " . $this->account_table_name . "
                ORDER BY
                    id ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    public function available(){
        $query = "SELECT p.`id`, p.`first_name`, p.`last_name`, p.`profile_status`, co.`address` FROM `professionals` p, `professionals_counties` c, `professionals_applications` a, `professionals_contact_details` co WHERE c.professional_id=p.id AND a.professional_id=p.id AND co.professional_id=p.id  AND c.county_id= :county AND a.application_id=:application ";

        $stmt = $this->conn->prepare( $query );

        $county_id = $this->county_id;
        $application_id = $this->application_id;
        $stmt->bindParam(':county',  $county_id, PDO::PARAM_INT);
        $stmt->bindParam(':application',  $application_id, PDO::PARAM_INT);

        $stmt->execute();
 
        return $stmt;
    }

    public function busySlots($startDate, $endDate, $id){
        $query ="SELECT `date`,`time`, `address` FROM `appointments` WHERE `prof_member_id`=".$id." AND `status`=1 AND `date` BETWEEN '".$startDate."' AND '".$endDate."'  ORDER BY `date`";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }
}
?>