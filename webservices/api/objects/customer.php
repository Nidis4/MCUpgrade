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
    public $address;
    public $phone;
    public $mobile;
    public $email;

    public function __construct($db){
        $this->conn = $db;
    }
 

    // search products
    public function search($keywords){
 
    // select all query
    $query = "SELECT
                c.id, c.first_name, c.last_name, c.sex, cc.address, cc.area , cc.postcode, cc.phone, cc.mobile, ca.email
            FROM
                " . $this->table_name . " c
                LEFT JOIN ". $this->contact_table_name." cc
                    ON c.id = cc.customer_id
                LEFT JOIN ". $this->account_table_name." ca
                    ON c.id = ca.customer_id
            WHERE
                c.first_name LIKE ? OR c.last_name LIKE ? OR cc.mobile LIKE ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";
 
    // bind
    $stmt->bindParam(1, $keywords);
    $stmt->bindParam(2, $keywords);
    $stmt->bindParam(3, $keywords);
 
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

    public function read(){
        //select all data
        $query = "SELECT
                c.id, c.first_name, c.last_name, c.sex, cc.address, cc.area , cc.postcode, cc.phone, cc.mobile, ca.email
            FROM
                " . $this->table_name . " c
                LEFT JOIN ". $this->contact_table_name." cc
                    ON c.id = cc.customer_id
                LEFT JOIN ". $this->account_table_name." ca
                    ON c.id = ca.customer_id
                ORDER BY
                    id DESC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    public function readPaging($from_record_num, $records_per_page){
     
        // select query
        $query = "SELECT
                c.id, c.first_name, c.last_name, c.sex, cc.address, cc.area , cc.postcode, cc.phone, cc.mobile, ca.email
            FROM
                " . $this->table_name . " c
                LEFT JOIN ". $this->contact_table_name." cc
                    ON c.id = cc.customer_id
                LEFT JOIN ". $this->account_table_name." ca
                    ON c.id = ca.customer_id
                ORDER BY
                    id DESC
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

    // used for paging products
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }

    function readOne(){
     
        // query to read single record
        $query = "SELECT
                c.id, c.first_name, c.last_name, c.sex, cc.address, cc.area , cc.postcode, cc.phone, cc.mobile, ca.email
            FROM
                " . $this->table_name . " c
                LEFT JOIN ". $this->contact_table_name." cc
                    ON c.id = cc.customer_id
                LEFT JOIN ". $this->account_table_name." ca
                    ON c.id = ca.customer_id
                WHERE
                    id = :id
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
        $this->first_name = $row['first_name'];
        $this->last_name = $row['last_name'];
        $this->sex = $row['sex'];
        $this->address = $row['address'];
        $this->phone = $row['phone'];
        $this->mobile = $row['mobile'];
        $this->email = $row['email'];
    } // Read One
}
?>