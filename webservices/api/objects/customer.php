<?php
class Customer{
 
    // database connection and table name
    private $conn;
    private $table_name = "customers";
    private $contact_table_name = "customers_contact_details";
    private $account_table_name = "customers_account_info";
 
    // object properties
    public $id;
    public $first_name;
    public $last_name;
    public $sex;
 
    public function __construct($db){
        $this->conn = $db;
    }
 

    // search products
function search($keywords){
 
    // select all query
    $query = "SELECT
                id, first_name, last_name, sex
            FROM
                " . $this->table_name . " 
            WHERE
                first_name LIKE ? OR last_name LIKE ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";
 
    // bind
    $stmt->bindParam(1, $keywords);
    $stmt->bindParam(2, $keywords);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
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