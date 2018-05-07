<?php

if($_POST){



                      $form = $_POST['form'];

    

                      $to = $_POST['to']; 



                      $email = $_POST['email']; 



                      $phone = $_POST['phone'];

                      

                     

                      

                    

                     

                      $mess = " \n \n Στοιχεία επικοινωνίας \n\n Μετακόμιση από: $form \n\n Μετακόμιση σε: $to \n\n Email: $email \n\n Τηλ.: $phone" ;

                      

                      $to = "mcr.chatzopoulou@gmail.com";

                     $subject= "Φόρμα Μετακόμισης Στοιχεία επικοινωνίας";

                      $headerFields = array('MIME-Version: 1.0', 'Content-Type: text/plain;charset=utf-8');



                      $mail_sent = @mail( $to, $subject, $mess,implode("\r\n", $headerFields));



                      echo $form . $to . $email . $phone; 



              }else{

                echo "lathos";

              }      



?>