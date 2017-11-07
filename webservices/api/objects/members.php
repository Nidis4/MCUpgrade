<?php
class Member{
 
    // database connection and table name
    private $conn;
    private $table_name = "members";
    private $contact_table_name = "members_contact_details";
    private $account_table_name = "members_account_info";
 
    // object properties
    public $member_id;
    public $address;
    public $area;
    public $city;
    public $country_id;
    public $latitude;
    public $longtitude;
    public $mobile;
    public $phone;
    public $postcode;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    public function contactDetails(){
        //select all data
        $query = "SELECT
                    `member_id`, `address`, `area`, `city`, `country_id`, `latitude`, `longtitude`, `postcode`, `phone`, `mobile`
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
                    `member_id`, `email`, `password`, `last_login`, `last_login_ip`, `modified`, `status`, `user_type`, `created`
                FROM
                    " . $this->account_table_name . "
                ORDER BY
                    id ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }
}
?>