<?php

class Viber{
 
    // database connection and table name
    private $conn;
    private $table_name = "sms_logs";
 
    // object properties
    const API_KEY = "C48DF017-B52D-4EB4-AD16-E966EFC42D56";
    const VIBER_SENDER = "MyConstructor.gr";
    const SMS_SENDER = "constructor";
 
    public function __construct($db){
        $this->conn = $db;
    }


    public function send($phone, $text, $date = NULL, $time = NULL){

        $url = 'https://services.yuboto.com/omni/v1/Send';

        if(@$date && @$time){
            $parameters = [
                    'phonenumbers' =>'30'.$phone,
                    'dateinToSend' => $date,
                    'timeinToSend' => $time,
                    'sms' => array('sender'=>self::SMS_SENDER,'text'=>$text,'typesms'=>'sms','priority'=>1),
                    'viber' => array('sender'=>self::VIBER_SENDER,'Text'=>$text,'priority'=>0,'expiryText'=>$text)
                  ];
        }else{
            $parameters = [
                    'phonenumbers' =>'30'.$phone,
                    'sms' => array('sender'=>self::SMS_SENDER,'text'=>$text,'typesms'=>'sms','priority'=>1),
                    'viber' => array('sender'=>self::VIBER_SENDER,'Text'=>$text,'priority'=>0,'expiryText'=>$text)
                  ];
        }
        
        $headers = array(
            'Content-type: application/json; charset=utf-8',
            'Authorization: Basic '.base64_encode(self::API_KEY),
        );
           
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);

        if(@$result){
            $response = json_decode($result);
            if($response->ErrorCode == 0){ // Sent Viber Message
              $lastRequestUrl = $url .'?'.json_encode($parameters);
              $lastResponse = json_encode($response->Message);
              $success = true;
              $query = "INSERT INTO ". $this->table_name." (`phone`, `text`, `request`, `response`, `datetime`) VALUES ('$phone', '$text', '$lastRequestUrl', '$lastResponse', NOW())";

              $stmt = $this->conn->prepare( $query );
              $stmt->execute();
              return "1";
            }
        }
        
        return '1';

    }

 
}
?>