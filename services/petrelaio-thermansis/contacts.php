<?php



if($_POST){



                      $name = $_POST['valname'];

    

                      $email = $_POST['valemail']; 



                      $tel = $_POST['valtel']; 



                      $address = $_POST['valaddress'];



                      $quantity = $_POST['valquantity'];



                      $date= $_POST['valdate'];



                      $pay= $_POST['pay'];



                      $price=$_POST['totalPriceOil'];



                      $offer=$_POST['totalOffer'];

                      



                     



                      



                    



                     



                      $mess = " \n \n Στοιχεία επικοινωνίας \n\n Όνομα: $name \n\n Email: $email \n\n Τηλ.: $tel \n\n Διεύθυνση: $address  \n\n  Ποσότητα: $quantity \n\n  Ημερομήνία: $date \n\n Τιμή: $price \n\n  Έκπτωση: $offer";



                      



                      $to = "info@myconstructor.gr";



                      $subject= "Φόρμα Παραγγελίας Πετρελαίου";



                      $headerFields = array('MIME-Version: 1.0', 'Content-Type: text/plain;charset=utf-8');







                      $mail_sent = @mail( $to, $subject, $mess,implode("\r\n", $headerFields));









                     $success=true;

                     echo json_encode($success);







              }else{



                echo "lathos";



              }      







?>