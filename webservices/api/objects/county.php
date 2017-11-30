<?php
class County{
 
    // database connection and table name
    private $conn;
    private $table_name = "counties";
 
    // object properties
    public $id;
    public $county_name;
    public $county_name_gr;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    public function read(){
        //select all data
        $query = "SELECT
                    id, county_name, county_name_gr
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