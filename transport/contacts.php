<?php

if($_POST){



                      $form = $_POST['form'];

    

                      $to = $_POST['to']; 



                      $email = $_POST['email']; 



                      $phone = $_POST['phone'];

                      $stop_over= $_POST['stop_over'];



                     

                      $mess = " \n \n Στοιχεία επικοινωνίας \n\n Μετακόμιση από: $form \n\n Μετακόμιση σε: $to \n\n Ενδίαμεσες στάσεις: $stop_over \n\n Email: $email \n\n Τηλ.: $phone" ;

                      

                     $to = "info@myconstructor.gr";



                     $subject= "Φόρμα Μετακόμισης Στοιχεία επικοινωνίας";

                      $headerFields = array('MIME-Version: 1.0', 'Content-Type: text/plain;charset=utf-8');



                      $mail_sent = @mail( $to, $subject, $mess,implode("\r\n", $headerFields));



                      echo $form . $to . $email . $phone; 



              }else{

                echo "lathos";

              }      



?>