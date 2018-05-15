<?php
 header('Access-Control-Allow-Origin: *'); 


if($_POST){
                      $renovation_type= $_POST['renovation_type'];

                      $tm = $_POST['tm'];

                      $valEmail = $_POST['valEmail']; 

                      $tel = $_POST['tel']; 

                      $paint = $_POST['paint'];

                      $porta_asfaleias = $_POST['porta_asfaleias'];

                      $koyfomata = $_POST['koyfomata'];

                      $esoterikes_portes = $_POST['esoterikes_portes'];

                      $ilektrologikes_ergasies = $_POST['ilektrologikes_ergasies'];

                      $ydraulikes_ergasies = $_POST['ydraulikes_ergasies'];

                      $systimata_thermansis = $_POST['systimata_thermansis'];

                      $dapeda = $_POST['dapeda'];

                      $tzaki = $_POST['tzaki'];

                      $tentes = $_POST['tentes'];

                      $budget = $_POST['budget'];

                      $txt = $_POST['txt'];

                      $select_sxedio = $_POST['select_sxedio'];

                      $idioktitis_enikiasti = $_POST['idioktitis_enikiasti'];

                      $perioxi = $_POST['perioxi'];

                      $episkepsi = $_POST['episkepsi'];

                      $anakainisi_pote = $_POST['anakainisi_pote'];




                     
                      $mess = "Φόρμα Προσφοράς Ανακαίνισης \n \n \n Στοιχεία επικοινωνίας \n\n Τηλ: $tel \n\n  Email: $valEmail \n\n $renovation_type \n\n Η ανακαίνιση είναι $tm m2 \n\n Έχετε σχέδιο για την ανακαίνιση σας; $select_sxedio \n\n $idioktitis_enikiasti \n\n Περιοχή: $perioxi \n\n $episkepsi \n\n Σκέφτομαι να κάνω ανακαίνιση σε: $anakainisi_pote \n\n Budget: $budget \n\n Σχόλια πελάτη: $txt \n\n Εργασίες που θα γίνουν: \n $paint \n $porta_asfaleias \n $koyfomata \n $esoterikes_portes \n $ilektrologikes_ergasies \n $ydraulikes_ergasies \n $systimata_thermansis \n $dapeda \n $tzaki \n $tentes ";

                      
                      $to = "giannis.pragias@gmail.com";

                      $subject= "Φόρμα Ανακαίνισης myconstructor.gr ". $valEmail . " " . $tel;

                      $headerFields = array('MIME-Version: 1.0', 'Content-Type: text/plain;charset=utf-8');



                      $mail_sent = @mail( $to, $subject, $mess,implode("\r\n", $headerFields));



                      echo $valEmail . $tel; 



              }else{

                echo "lathos";

              }      



?>