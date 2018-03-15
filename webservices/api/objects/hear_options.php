<?php
class HearOption{
 
    // database connection and table name
    private $conn;
    private $table_name = "hear_options";
 
    // object properties
    public $id;
    public $option;
    public $option_greek;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    public function read(){
        //select all data
        $query = "SELECT
                    id, option, option_greek
                FROM
                    " . $this->table_name . "
                ORDER BY
                    option ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    
}
?>