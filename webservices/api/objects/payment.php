<?php
class Payment{
 
    // database connection and table name
    private $conn;
    private $table_name = "payments";
    private $professionals_table_name = "professionals";
    private $customers_table_name = "customers";
    private $invoicesettings_table_name = "professionals_invoice_settings";
    private $contact_table_name = "professionals_contact_details";
 
    // object properties
    public $payment_id;
    public $professional_id;
    public $category_id;
    public $amount;
    public $agent_id;
    public $comment;
    public $type;
    public $bank_name;
    public $datetime_added;
    public $status;
    public $datetimeStatusUpdated;
    public $cancelComment;
 
    public function __construct($db){
        $this->conn = $db;
    }


    public function paymentByProf(){
     
        // select query
        $query = "SELECT `id`,`category_id`, `amount`,`type`, `agent_id`, `comment`, `datetime_added`, `status`,`cancelReason`,`datetimeStatusUpdated`,`cancelComment` FROM ".$this->table_name." WHERE `professional_id` = ? ORDER BY `id` DESC";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $professional_id = $this->professional_id;
        $stmt->bindParam(1, $professional_id, PDO::PARAM_INT);
        
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    public function save($professional_id, $category_id, $amount, $agent_id, $comment, $type, $bank_name, $datetime_added, $issuetype ){

        $invoice_no = "";
        $receipt_no = "";

        if(@$issuetype){
            $q = "Select Count(`id`) as itotal from ". $this->table_name . " where `issuetype` = '".$issuetype."'";
            $s = $this->conn->prepare( $q );
            $s->execute();
            $t = $s->fetch();
            $count = $t['itotal'];
            if($issuetype == "Invoice"){
               $invoice_no =  intval($count) + 1;
            }else{
               $receipt_no =  intval($count) + 1; 
            }
            
        }

        $query = "INSERT INTO " . $this->table_name . " (`professional_id`, `category_id`, `amount`, `agent_id`, `comment`, `type`, `bank_name`, `datetime_added`,`issuetype`,`invoice_no`,`receipt_no`) VALUES ('".$professional_id."', '".$category_id."', '".$amount."', '".$agent_id."', '".$comment."', '".$type."', '".$bank_name."', '".$datetime_added."', '".$issuetype."', '".$invoice_no."', '".$receipt_no."')";
        
        $stmt = $this->conn->prepare( $query );

        if ($stmt->execute()) { 
           return 1;
        } else {
           return 0;
        }
    }

    public function saveCustomerInvoice($customer_id, $category_id, $amount, $agent_id, $comment, $type, $bank_name, $datetime_added, $issuetype ){



        if($issuetype == '1'){
            $issuetype = "Invoice";
        }else if($issuetype == '2'){
            $issuetype = "Receipt";
        }

        $invoice_no = "";
        $receipt_no = "";

        if(@$issuetype){
            $q = "Select Count(`id`) as itotal from ". $this->table_name . " where `issuetype` = '".$issuetype."'";
            $s = $this->conn->prepare( $q );
            $s->execute();
            $t = $s->fetch();
            $count = $t['itotal'];
            if($issuetype == "Invoice"){
               $invoice_no =  intval($count) + 1;
            }else{
               $receipt_no =  intval($count) + 1; 
            }
            
        }

        $query = "INSERT INTO " . $this->table_name . " (`customer_id`, `category_id`, `amount`, `agent_id`, `comment`, `type`, `bank_name`, `datetime_added`,`issuetype`,`invoice_no`,`receipt_no`) VALUES ('".$customer_id."', '".$category_id."', '".$amount."', '".$agent_id."', '".$comment."', '".$type."', '".$bank_name."', '".$datetime_added."', '".$issuetype."', '".$invoice_no."', '".$receipt_no."')";
        
        $stmt = $this->conn->prepare( $query );

        if ($stmt->execute()) { 
           return 1;
        } else {
           return 0;
        }
    }

    public function edit($id, $professional_id, $category_id, $amount, $agent_id, $comment, $type, $bank_name, $datetime_added, $issuetype ){
        $invoice_no = "";
        $receipt_no = "";



        $query = "UPDATE ".$this->table_name." SET `category_id` = '".$category_id."', `type` = '".$type."', `bank_name` = '".$bank_name."', `amount` = '".$amount."', `comment` = '".$comment."' WHERE `id` = '".$id."';";
        
        $stmt = $this->conn->prepare( $query );

        if ($stmt->execute()) { 
           return 1;
        } else {
           return 0;
        }
    }

    public function updatePayment($id, $amount, $comment, $datetime_added){



        $query = "UPDATE ".$this->table_name." SET `amount` = '".$amount."', `comment` = '".$comment."' WHERE `id` = '".$id."';";
        
        $stmt = $this->conn->prepare( $query );

        if ($stmt->execute()) { 
           return 1;
        } else {
           return 0;
        }
    }

    function cancelpayment($cancelReason = NULL, $cancelComment = NULL){


        if(@$cancelReason){

        }else{
            $cancelReason = 0;
        }

        if(@$cancelComment){

        }else{
            $cancelComment = "";
        }

        // query to read single record
        $query = "UPDATE " . $this->table_name . "
                    SET
                    `status`=0, `cancelReason`= :cancelReason, `cancelComment`= :cancelComment ,`datetimeStatusUpdated` ='".date('Y-m-d H:i:s')."'
                WHERE
                    id = :id";
     
        $stmt = $this->conn->prepare( $query );
     
        $cur_id = $this->id;
        // bind id of product to be updated
        $stmt->bindParam(':id',  $cur_id, PDO::PARAM_INT);
        $stmt->bindParam(':cancelReason',  $cancelReason, PDO::PARAM_INT);
        $stmt->bindParam(':cancelComment',  $cancelComment);

        if ($stmt->execute()) { 
            
           return 1;
        } else {
            
           return 0;
        }
    } // CancelAppointment

    public function get_percentage($professional_id){
         // select query
        $query = "SELECT SUM(amount) AS percentage FROM ".$this->table_name." WHERE professional_id = '".$professional_id."' AND status = '1' AND datetime_added  BETWEEN CURDATE() - INTERVAL 90 DAY AND CURDATE()";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        
        
        // execute query
        $stmt->execute();
        $percentage = $stmt->fetch();
        if(@$percentage['percentage']){
            
            $query1 = "SELECT SUM(budget) AS percentage FROM appointments WHERE prof_member_id = '".$professional_id."' AND `status` IN('1','0') AND `cancelReason` IN('0','2') AND `date` BETWEEN CURDATE() - INTERVAL 90 DAY AND CURDATE()";
     
            // prepare query statement
            $stmt1 = $this->conn->prepare( $query1 );
            
            // execute query
            $stmt1->execute();
            $percentage2 = $stmt1->fetch();
            if(@$percentage2['percentage']){
                $return = number_format((($percentage['percentage']/$percentage2['percentage'])*100),2)."%";
                return $return;
            }else{
                return '0.0%';
            }
        }else{
            return '0.0%';
        }
        
    }



        // read products with pagination
    public function readInvoicePaging($from_record_num, $records_per_page){
     
        // select query
        $query = "SELECT pm.`id`as payment_id, pm.`professional_id`, pm.`sent_email`, pm.`datetime_added`, pm.`invoice_no`, pm.`comment`, pm.`amount`, pm.`status`, pp.`first_name`, pp.`last_name`,  pc.`first_name` as cfirst_name, pc.`last_name` as clast_name
                FROM
                    " . $this->table_name . " pm  
                Left Join ".$this->professionals_table_name." pp 
                on pm.professional_id = pp.id 
                Left Join ".$this->customers_table_name." pc 
                on pm.customer_id = pc.id 
                WHERE (pm.`status`=1 OR pm.`status`=0) and pm.`issuetype` = 'Invoice'
                ORDER BY `datetime_added` DESC
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

    public function invoicecount(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . " where issuetype='Invoice' and (status='1' or status='0')";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }

        // read products with pagination
    public function readReceiptPaging($from_record_num, $records_per_page){
     
        // select query
        $query = "SELECT pm.`id`as payment_id, pm.`professional_id`, pm.`sent_email`, pm.`datetime_added`, pm.`receipt_no`, pm.`comment`, pm.`amount`, pm.`status`,  pp.`first_name`, pp.`last_name`, pc.`first_name` as cfirst_name, pc.`last_name` as clast_name
                FROM
                    " . $this->table_name . " pm  
                Left Join ".$this->professionals_table_name." pp 
                on pm.professional_id = pp.id 
                Left Join ".$this->customers_table_name." pc 
                on pm.customer_id = pc.id 
                WHERE (pm.`status`=1 OR pm.`status`=0) and pm.`issuetype` = 'Receipt'
                ORDER BY `datetime_added` DESC
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

    public function receiptcount(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . " where issuetype='Receipt' and (status='1' or status='0')";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }

    function readOne(){
     
        // query to read single record
        $query = "SELECT pm.*, iv.`company_name`, iv.`profession`, iv.`address` as legal_address, iv.`tax_id`, iv.`tax_office`, pc.`phone`,  pp.`first_name`, pp.`last_name`, iv.`receipt_email`
                FROM
                    " . $this->table_name . " pm 
                Left Join ".$this->invoicesettings_table_name." iv 
                on pm.professional_id = iv.professional_id  
                Left Join ".$this->contact_table_name." pc 
                on pm.professional_id = pc.professional_id 
                Left Join ".$this->professionals_table_name." pp 
                on pm.professional_id = pp.id                
                WHERE
                    pm.id = :id
                LIMIT
                    0,1";
    
     //echo $query;
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
     //echo $this->id." ------ ";

     $cur_id = $this->payment_id;
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
        $this->professional_id = $row['professional_id'];
        $this->category_id = $row['category_id'];
        $this->amount = $row['amount'];
        $this->agent_id = $row['agent_id'];
        $this->comment = $row['comment'];
        $this->type = $row['type'];
        $this->bank_name =$row['bank_name'];
        $this->datetime_added = $row['datetime_added'];
        $this->issuetype = $row['issuetype'];
        $this->invoice_no = $row['invoice_no'];
        $this->receipt_no = $row['receipt_no'];
        $this->status = $row['status'];
        $this->datetimeStatusUpdated = $row['datetimeStatusUpdated'];
        $this->cancelComment = $row['cancelComment'];

        $this->company_name = $row['company_name'];
        $this->profession = $row['profession'];
        $this->legal_address = $row['legal_address'];
        $this->tax_id = $row['tax_id'];
        $this->tax_office = $row['tax_office'];
        
        $this->phone = $row['phone'];
        $this->first_name = $row['first_name'];
        $this->last_name = $row['last_name'];
        $this->receipt_email = $row['receipt_email'];



    } // Read One

    public function sentEmail(){
        // query to read single record
        $query = "UPDATE " . $this->table_name . "
                    SET
                    `sent_email`=1
                WHERE
                    id = :id";
     
        $stmt = $this->conn->prepare( $query );
     
        $cur_id = $this->payment_id;
        // bind id of product to be updated
        $stmt->bindParam(':id',  $cur_id, PDO::PARAM_INT);

        if ($stmt->execute()) { 
            
           return 1;
        } else {
            
           return 0;
        }
    }
}
?>