<?php
class ProfessionalClass{

    // database connection and table name
    private $conn;

    // object properties
    public $professional_id;

    public function __construct($db){
        $this->conn = $db;
    }
    // Appoinments List
    public function LoginProfessional($email,$password){
        $sql ="SELECT `professional_id`, `email` FROM `professionals_account_info` WHERE `email` ='".$email."' AND `password`= '".md5($password)."' AND `status`='2'";
        //$sql ="SELECT `professional_id`, `email` FROM `professionals_account_info` WHERE `email` ='".$email."' AND `password`= '".$password."'";
        // prepare query statement
        $stmt = $this->conn->prepare($sql);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    public function getProfessionalByID($id){
        $query = "SELECT first_name, last_name FROM professionals WHERE `id`=".$id."";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row;
    }
    public function PostMemberDeviceToken($professional_id,$device_token,$device_status){

        $query = "SELECT `prof_member_id` FROM `professionals_device_tokens` WHERE `prof_member_id` = '".$professional_id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        if ($stmt -> rowCount() > 0){
            $device_token_query = "UPDATE `professionals_device_tokens` SET `device_token`='".$device_token."',`device_status`='".$device_status."' WHERE `prof_member_id` ='".$professional_id."'";
        }
        else{
            $device_token_query = "INSERT INTO `professionals_device_tokens`(`prof_member_id`, `device_token`, `device_status`) VALUES ('".$professional_id."','".$device_token."','".$device_status."')";
        }
        $stmtdevicetoken = $this->conn->prepare( $device_token_query );
        $stmtdevicetoken->execute();
        return $stmtdevicetoken;
    }
    public function GetProfessionalsPaymentList($member_id){
        $query = "SELECT * FROM `appointments` WHERE `prof_member_id` ='".$member_id."' AND (`status`='1' OR `status`='0') order by `date`,`time` ASC";
       
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
       // $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $stmt;
    }
    
    public function FreeBusyStatus($member_id,$free_busy_status){

        $query = "SELECT `id`, `member_id`, `status`, `created_date` FROM `free_busy` WHERE `member_id` = '".$member_id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        if ($stmt -> rowCount() > 0){
            $device_token_query = "UPDATE `free_busy` SET `status`='".$free_busy_status."' WHERE `member_id` = '".$member_id."'";
        }
        else{
            $device_token_query = "INSERT INTO `free_busy`(`member_id`, `status`) VALUES ('".$member_id."','".$free_busy_status."')";
        }
        $stmtfreebusystatus = $this->conn->prepare( $device_token_query );
        $stmtfreebusystatus->execute();
        return $stmtfreebusystatus;
    }


    public function GetFreeBusyStatus($member_id){

    $query = "SELECT `id`, `member_id`, `status`, `created_date` FROM `free_busy` WHERE `member_id`=".$member_id."";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        /*$row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;*/
         if ($stmt -> rowCount() > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }
        else{
            return '';
        }

       } 
    public function Getdirectory_ratings($member_id){
        $query = "SELECT * FROM `directory_ratings` WHERE `professional_id` = '".$member_id."' AND `active` = 'yes'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        
         if ($stmt -> rowCount() > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }
        else{
            return '';
        }
        
        /* $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;*/
    }

   public function Getappointmentsbudget($member_id){
        $query = "SELECT SUM(appointments.budget) AS percentage FROM `appointments` WHERE `prof_member_id` = '".$member_id."' AND `status` IN('1','0') AND `cancelReason` IN('0','2') AND `date` BETWEEN CURDATE() - INTERVAL 90 DAY AND CURDATE()";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        
         $rowappo = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rowappo;
    }

    public function Getpaymentsbudget($member_id){
        $query = "SELECT SUM(payments.amount) AS `percentage` FROM `payments` WHERE `professional_id` = '".$member_id."' AND `status` = '1' AND `datetime_added` BETWEEN CURDATE() - INTERVAL 90 DAY AND CURDATE()";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        
         $rowappo = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rowappo;
    }

  //suspend profetionals

     public function Getcommision($member_id){
        $query = "SELECT SUM(commision) as commisiont FROM `appointments` WHERE `prof_member_id` ='".$member_id."' AND status='1'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        
         $rowappo = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rowappo;
    }

     public function GetPropayment($member_id){
        $query = "SELECT `payments`.*, SUM(`amount`) as propayment FROM `payments` WHERE `professional_id`='".$member_id."' AND `status` ='1' and `datetime_added` <= NOW() ORDER BY `datetime_added` DESC LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        
         $rowappo = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rowappo;
    }
     public function DelProfessionalsPaymentLastDates($member_id){

        $query = "DELETE FROM `professionals_payment_last_dates` WHERE `member_id` ='".$member_id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
    }

   
    public function GetProfessionalsPaymentLastDates($member_id){
        $query = "SELECT `member_id`,`created_date` FROM `professionals_payment_last_dates` WHERE `member_id`='".$member_id."' ORDER BY `id` DESC LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        
         $rowappo = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rowappo;
    }

    public function InsProfessionalsPaymentLastDates($member_id){

        $query = "INSERT INTO `professionals_payment_last_dates`(`member_id`) VALUES ('".$member_id."')";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
    }
    public function CheckProfessionalExists($email){
        $query = "SELECT `professional_id` FROM `professionals_account_info` WHERE `email`='".$email."' ";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        if ($stmt -> rowCount() > 0){
            return 1;
        }
        else{
            return 0;
        }
        
    }
    public function GenerateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function ForgetPasswordProf($pass,$email) {
        $passmd = md5($pass);
        $query = "UPDATE `professionals_account_info` SET `password`='".$passmd."' WHERE `email`='".$email."' ";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $subject = "Forgot Password";
        $txt = '<html><body>';
        $txt .= "<h3>MYCONSTRUCTOR PASSWORD REMINDER</h3><br><br>";
        $txt .= "<span>Your password for your myconstructor account is :<b>".$pass."</b></span>";
        $txt .="<br><br><br><br>";
        $txt .= "<span>Thanks</span><br>";
        $txt .= "<span>From the <b>Myconstructor Team</b></span>";
        $txt .= '</body></html>';
        $headers  = "From: myconstructor.com@gmail.com \r\n";
        $headers .= "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        $mail = mail($email,$subject,$txt,$headers);
    }
    
}
?>