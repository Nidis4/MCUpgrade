<?php

class Category{
 
    // database connection and table name
    private $conn;
    private $table_name = "categories";
 
    // object properties
    public $id;
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
                    id, title, title_greek, description, description_greek, sequence, modified, commissionRate
                FROM
                    " . $this->table_name . "
                ORDER BY
                    title_greek ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    public function readByCategoryPrice(){
        //select all Prices data
        $query = "SELECT
                    *
                FROM
                    categories_prices
                WHERE
                    category_id = :cat_id
                ORDER BY
                    id ASC";
 
        $stmt = $this->conn->prepare( $query );

        $cur_id = $this->category_id;
        // bind id of product to be updated
        $stmt->bindParam(':cat_id',  $cur_id, PDO::PARAM_INT);
        //$stmt->bindValue(':id', '$cur_id', PDO::PARAM_STR);

        $stmt->execute();
 
        return $stmt;
    }
}
?>