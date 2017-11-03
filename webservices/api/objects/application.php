<?php
class Application{
 
    // database connection and table name
    private $conn;
    private $table_name = "applications";
 
    // object properties
    public $id;
    public $category_id;
    public $title;
    public $title_greek;
    public $short_description;
    public $short_description_gr;
    public $detail_description;
    public $detail_description_gr;
    public $unit;
    public $min_price;
    public $sequence;
    public $modified;

 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    public function read(){
        //select all data
        $query = "SELECT
                    id, category_id, title, title_greek, short_description, short_description_gr, detail_description, detail_description_gr, unit, min_price, sequence, modified
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