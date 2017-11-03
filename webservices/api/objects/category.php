<?php
class Category{
 
    // database connection and table name
    private $conn;
    private $table_name = "categories";
 
    // object properties
    public $id;
    public $name;
    public $name_greek;
    public $title;
    public $title_greek;
    public $description;
    public $description_greek;
    public $sequence;
    public $modified;
    public $commissionRate;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    public function read(){
        //select all data
        $query = "SELECT
                    id, name, name_greek, title, title_greek, description, description_greek, sequence, modified, commissionRate
                FROM
                    " . $this->table_name . "
                ORDER BY
                    id ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }
}
?>