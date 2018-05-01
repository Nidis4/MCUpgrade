<?php
class Help{
 
    // database connection and table name
    private $conn;
    private $table_name = "help";
    private $category_table_name = "categories";
 
    // object properties
    public $id;
    public $category_id;
    public $name;
    public $help;

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



    public function readPaging($from_record_num, $records_per_page){
     
        // select query
        $query = "SELECT
                h.id, h.category_id, h.name, h.help, c.name as category_name, c.name_greek as category_name_greek
            FROM
                " . $this->table_name . " h
                LEFT JOIN ". $this->category_table_name." c
                    ON c.id = h.category_id
                ORDER BY
                    h.category_id DESC
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
                h.id, h.category_id, h.name, h.help
            FROM
                " . $this->table_name . " h
                WHERE
                    h.id = :id
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
        $this->id = $row['id'];
        $this->category_id = $row['category_id'];
        $this->name = $row['name'];
        $this->help = $row['help'];

        if(@$row){
            return 1;
        }else{
             return 0;
        }
    } // Read One


    function update($id, $category_id, $name, $help){
        

        $query = "INSERT INTO ". $this->table_name ." (`id`, `category_id`, `name`, `help`) VALUES (:id, :category_id, :name, :help) ON DUPLICATE KEY UPDATE `category_id`=:category_id, `name`=:name, `help`=:help";

        $stmt = $this->conn->prepare( $query );
       
        // bind id of product to be updated
        $stmt->bindParam(':id',  $id);
        $stmt->bindParam(':category_id',  $category_id);
        $stmt->bindParam(':name',  $name);
        $stmt->bindParam(':help',  $help);
        
        if ($as = $stmt->execute()) {
           if(empty($id)){ 
                //$stmt->commit();
                $id = $this->conn->lastInsertId();
           }
           return $id;
        } else {
           return 0;
        }
    } // Save Help

    function insert($category_id, $name, $help){

        $query = "INSERT INTO ". $this->table_name ." (`category_id`, `name`, `help`) VALUES (:category_id, :name, :help)";

        $stmt = $this->conn->prepare( $query );
       
        // bind id of product to be updated
        
        $stmt->bindParam(':category_id',  $category_id);
        $stmt->bindParam(':name',  $name);
        $stmt->bindParam(':help',  $help);
        
        if ($as = $stmt->execute()) {
           
            $id = $this->conn->lastInsertId();
           
           return $id;
        } else {
           return 0;
        }

    }

    


}
?>