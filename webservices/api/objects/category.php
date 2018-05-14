<?php

class Category{
 
    // database connection and table name
    private $conn;
    private $table_name = "categories";
    private $question_table_name = "categories_questions";
    private $question_answer_table_name = "categories_questions_answers";
    private $table_meta = "categories_meta";
 
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
                    c.id, c.title, c.title_greek, c.description, c.description_greek, c.sequence, c.modified, c.commissionRate, m.meta_title, m.meta_description, m.meta_robots, m.permalink
                FROM
                    `" . $this->table_name . "` c
                LEFT JOIN `" . $this->table_meta . "` m ON m.category_id= c.id 
                ORDER BY
                    title_greek ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    function read_cat_id($permalink){
        $query ="SELECT * FROM categories_meta WHERE permalink ='".$permalink."'";
        
        $stmt = $this->conn->prepare( $query );
     
        $stmt->execute();
     
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        // set values to object properties
        $this->category_id = $row['category_id'];
        $this->meta_title = $row['meta_title'];
        $this->meta_description = $row['meta_description'];
        $this->meta_robots = $row['meta_robots'];
        $this->permalink = $row['permalink'];
    }

    function read_cat_meta($id){
        $query ="SELECT * FROM categories_meta WHERE category_id ='".$id."'";
        
        $stmt = $this->conn->prepare( $query );
     
        $stmt->execute();
     
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        // set values to object properties
        $this->category_id = $row['category_id'];
        $this->meta_title = $row['meta_title'];
        $this->meta_description = $row['meta_description'];
        $this->meta_robots = $row['meta_robots'];
        $this->permalink = $row['permalink'];
    }

    function readOne(){
     
        // query to read single record
        $query = "SELECT
                id, title, title_greek, description, description_greek, sequence, modified, commissionRate
                FROM
                " . $this->table_name . "                
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
        $this->title = $row['title'];
        $this->title_greek = $row['title_greek'];
        $this->description = $row['description'];
        $this->description_greek = $row['description_greek'];
        $this->sequence = $row['sequence'];
        $this->modified = $row['modified'];
        $this->commissionRate = $row['commissionRate'];
    } // Read One

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

    public function questions(){
        //select all data
        $query = "SELECT * 
                FROM
                    " . $this->question_table_name . " 
                WHERE
                    category_id = :cat_id
                ORDER BY
                    seuqence ASC";
 
        $stmt = $this->conn->prepare( $query );

        $cur_id = $this->category_id;
        // bind id of product to be updated
        $stmt->bindParam(':cat_id',  $cur_id, PDO::PARAM_INT);

        $stmt->execute();
 
        return $stmt;
    }

    public function answers($questionid){
        //select all data
        $query = "SELECT * 
                FROM
                    " . $this->question_answer_table_name . " 
                WHERE
                    question_id = :que_id
                ORDER BY
                    id ASC";
 
        $stmt = $this->conn->prepare( $query );

        $cur_id = $questionid;
        // bind id of product to be updated
        $stmt->bindParam(':que_id',  $cur_id, PDO::PARAM_INT);

        $stmt->execute();
 
        return $stmt;
    }

    function updateCat($id, $meta_title, $meta_description, $meta_robots, $permalink){
        $query = "INSERT INTO `categories_meta`(`category_id`, `meta_title`, `meta_description`, `meta_robots`, `permalink`) VALUES ('".$id."', '".$meta_title."', '".$meta_description."', '".$meta_robots."', '".$permalink."') ON DUPLICATE KEY UPDATE `meta_title`= '".$meta_title."' , `meta_description`= '".$meta_description."', `meta_robots`= '".$meta_robots."', `permalink`= '".$permalink."'  ";
        //echo $query;
        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // execute query
        $stmt->execute();
        return $stmt;
    }    



    function readCategoryMeta($cat_id){

        $query ="SELECT * FROM categories_meta WHERE category_id ='".$cat_id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
        
    }


    public function moveCategory(){
        
        $query ="SELECT professional_id, category_id FROM professionals_applications";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // echo "<pre>";
            // print_r($row);
            // die;
            $query1 ="SELECT id FROM professionals_categories where professional_id='".$row['professional_id']."' and category_id ='".$row['category_id']."'";
            $stmt1 = $this->conn->prepare( $query1 );
            $stmt1->execute();
            $num = $stmt1->rowCount();
            
            if($num == 0){
                $query2 = "INSERT INTO `professionals_categories` (`professional_id`, `category_id`) VALUES ('".$row['professional_id']."', '".$row['category_id']."')";

                //echo $query;
                // prepare query statement
                $stmt2 = $this->conn->prepare( $query2 );

                // execute query
                $stmt2->execute();
            }

        }

        return 1;

    }

}




?>