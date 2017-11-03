<?php
class Admin{
 
    // database connection and table name
    private $conn;
    private $table_name = "admin";
 
    // object properties
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $email;
    public $mobile_nr;
    public $password_changed;
    public $type;
    public $last_login;
    public $active;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
     
        // select all query
        $query = "SELECT  a.id, a.username, a.password, a.first_name, a.last_name, a.email, a.mobile_nr, a.password_changed, a.type, a.last_login, a.active
                FROM `" . $this->table_name . "` a ORDER BY a.id ASC";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        return $stmt;
    }
}