<?php
class Customer{
 
    // database connection and table name
    private $conn;
    private $table_name = "customers";
    private $contact_table_name = "customers_contact_details";
    private $account_table_name = "customers_account_info";
    private $invoicesettings_table_name = "customers_invoice_settings";
 
    // object properties
    public $id;
    public $first_name;
    public $last_name;
    public $sex;
    public $address;
    public $phone;
    public $mobile;
    public $mobile2;
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

    // search products
    public function searchByMobile($mobile){
 
    // select all query
    $query = "SELECT
                    cc.customer_id
            FROM
                " . $this->contact_table_name . " cc
            WHERE
                 cc.mobile = ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $mobile=htmlspecialchars(strip_tags($mobile));
    
 
    // bind
    $stmt->bindParam(1, $mobile);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
    }

    // search products
    public function searchList($name, $surname, $mobile, $email){
 
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
                c.first_name LIKE ? AND c.last_name LIKE ? AND cc.mobile LIKE ? AND ca.email LIKE ?
                LIMIT 0, 30";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $name=htmlspecialchars(strip_tags($name));
    $name = "%{$name}%";
    $surname=htmlspecialchars(strip_tags($surname));
    $surname = "%{$surname}%";
    $mobile=htmlspecialchars(strip_tags($mobile));
    $mobile = "%{$mobile}%";
    $email=htmlspecialchars(strip_tags($email));
    $email = "%{$email}%";
 
    // bind
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $surname);
    $stmt->bindParam(3, $mobile);
    $stmt->bindParam(4, $email);
 
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
                c.id, c.first_name, c.last_name, c.sex, cc.address, cc.area , cc.postcode, cc.phone, cc.mobile, cc.mobile2, ca.email
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
        $this->mobile2 = $row['mobile2'];
        $this->email = $row['email'];
    } // Read One


    function update($id, $first_name, $last_name, $address, $sex, $mobile, $phone, $email, $mobile2){
        
        /*$query = "UPDATE " . $this->table_name . "
                    SET
                    `first_name`=:first_name, `last_name`=:last_name, `sex`=:sex";
        
        $query .=" WHERE id = :id";*/
        
        if(@$id){
            $id = $id;
        }elseif(@$mobile){
            $query = "Select customer_id from ".$this->contact_table_name." where mobile='".$mobile."'";        
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
            $num = $stmt->rowCount();
            if($num >= 1){
                // get retrieved row
                $row = $stmt->fetch(PDO::FETCH_ASSOC);  
                $id = $row['customer_id'];            
            }else{
                $id = NULL;
            }
        }else{
            $id = NULL;
        }


        $query = "INSERT INTO ". $this->table_name ." (`id`, `first_name`, `last_name`, `sex`) VALUES (:id, :first_name, :last_name, :sex) ON DUPLICATE KEY UPDATE `first_name`=:first_name, `last_name`=:last_name, `sex`=:sex";

        $stmt = $this->conn->prepare( $query );
       
        // bind id of product to be updated
        $stmt->bindParam(':id',  $id);
        $stmt->bindParam(':first_name',  $first_name);
        $stmt->bindParam(':last_name',  $last_name);
        $stmt->bindParam(':sex',  $sex);
        
        if ($as = $stmt->execute()) {
           if(empty($id)){ 
                //$stmt->commit();
                $id = $this->conn->lastInsertId();
           }
           $this->update_contact($id, $address, $mobile, $phone, $mobile2); 
           $this->update_account($id, $email ); 

           return $id;
        } else {
           return 0;
        }
    } // Save Customer

    function update_contact($id, $address, $mobile, $phone, $mobile2 ){
        /*$query = "UPDATE " . $this->contact_table_name . "
                    SET
                    `mobile`=:mobile, `phone`=:phone, `address`=:address";
        
        $query .=" WHERE customer_id = :id";*/

        $query = "INSERT INTO ". $this->contact_table_name ." (`customer_id`, `address`, `mobile`, `phone`, `mobile2`) VALUES (:id, :address, :mobile, :phone, :mobile2) ON DUPLICATE KEY UPDATE `phone`=:phone, `mobile`=:mobile, `address`=:address, `mobile2`=:mobile2";

        $stmt = $this->conn->prepare( $query );

        // bind id of product to be updated
        $stmt->bindParam(':id',  $id, PDO::PARAM_INT);
        $stmt->bindParam(':mobile',  $mobile);
        $stmt->bindParam(':phone',  $phone);
        $stmt->bindParam(':address',  $address);
        $stmt->bindParam(':mobile2',  $mobile2);
        
        if ($stmt->execute()) { 
           return 1;
        } else {
           return 0;
        }
    } // Save Professional

    function update_account($id, $email ){
        
        /*$query = "UPDATE " . $this->account_table_name . "
                    SET
                    `email`=:email";
        
        $query .=" WHERE customer_id = :id";*/

        $query = "INSERT INTO ". $this->account_table_name ." (`customer_id`, `email`) VALUES (:id, :email) ON DUPLICATE KEY UPDATE `email`=:email";

        $stmt = $this->conn->prepare( $query );

       
        // bind id of product to be updated
        $stmt->bindParam(':id',  $id, PDO::PARAM_INT);
        $stmt->bindParam(':email',  $email);
        
        if ($stmt->execute()) { 
           return 1;
        } else {
           return 0;
        }
    } // Save Professional


    public function getIncoiceSettings(){
        $query = "Select pi.* from ".$this->invoicesettings_table_name." pi 
                  where pi.customer_id = :id";

        $stmt = $this->conn->prepare( $query );
        $id = $this->id;
        $stmt->bindParam(':id',  $id, PDO::PARAM_INT);
        
        $stmt->execute();

        // return values from database
        return $stmt;

    }

    function updateInvoiceSettings($customer_id, $company_name, $profession, $address, $tax_id, $tax_office, $receipt_email, $viewtype){


        $query = "INSERT INTO ". $this->invoicesettings_table_name ." (`customer_id`, `company_name`, `profession`, `address`, `tax_id`, `tax_office`, `receipt_email`, `viewtype`) VALUES (:customer_id, :company_name, :profession, :address, :tax_id, :tax_office, :receipt_email, :viewtype) ON DUPLICATE KEY UPDATE `company_name`=:company_name, `profession`=:profession, `address`=:address, `tax_id`=:tax_id, `tax_office`=:tax_office, `receipt_email`=:receipt_email,  `viewtype`=:viewtype";

        $stmt = $this->conn->prepare( $query );
       
        // bind id of product to be updated
        $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
        $stmt->bindParam(':company_name',  $company_name);
        $stmt->bindParam(':profession',  $profession);
        $stmt->bindParam(':address',  $address);
        $stmt->bindParam(':tax_id',  $tax_id);
        $stmt->bindParam(':tax_office',  $tax_office);
        
        $stmt->bindParam(':receipt_email',  $receipt_email);
        
        $stmt->bindParam(':viewtype',  $viewtype);
        //$stmt->execute();
        //$stmt->debugDumpParams();
        //die($customer_id);
        
        if ($stmt->execute()) {
           //die('sdf');
           return 1;
           
        } else {
           //die('0');
           return 0;

        }
    } // Save Customer Invoice Setting

}
?>