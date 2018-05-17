<?php

if($_POST){





                      // Unescape the string values in the JSON array

                      $myThings = stripcslashes($_POST['myThings']);



                      // Decode the JSON array

                      $myThings = json_decode($myThings,TRUE);



                      $fromAddress= $_POST['fromAddress'];

                      $toAddreess= $_POST['toAddreess'];

                      $stop_over= $_POST['stop_over'];

                      $email= $_POST['email'];

                      $tel= $_POST['tel'];

                      $selectService= $_POST['selectService'];



                      $oldHouseRange= $_POST['oldHouseRange'];

                      $oldFloor= $_POST['oldFloor'];

                      $oldLift= $_POST['oldLift'];

                      $oldHighRoad= $_POST['oldHighRoad'];

                      $oldExternalLift= $_POST['oldExternalLift'];



                      $newHouseRange= $_POST['newHouseRange'];

                      $newFloor= $_POST['newFloor'];

                      $newLift= $_POST['newLift'];

                      $newHighRoad= $_POST['newHighRoad'];

                      $newExternalLift= $_POST['newExternalLift'];



                      //$epilogiAmpalaz= $_POST['epilogiAmpalaz'];

                      //$epilogiLisimoDesimo= $_POST['epilogiLisimoDesimo'];



                      $variaAntikeimena= $_POST['variaAntikeimena'];



                      $antikeimenaAksias= $_POST['antikeimenaAksias'];

                      $myDate= $_POST['myDate'];

                      $profName= $_POST['profName'];

                      $profSurName= $_POST['profSurName'];


                      $userMsg= $_POST['userMsg'];

                      $member_id = $_POST['professional'];



                      $mess="<h2>Φόρμα Μετακόμισης</h2><br/>";

                      
                      $mess.="<b>Ο χρήστης έστειλε την φόρμα από το προφίλ: ". $profName ." ". $profSurName ."</b>";
                      

                      $mess.="<h3>Στοιχεία Επικοινωνίας</h3>";

                      $mess.="<p>Email: <b>".$email."</b> Τηλέφωνο: <b>".$tel."</b></p><br/>";

                      $mess.="<h3>Πληροφορίες Μετακόμισης</h3>";

                      $mess.="<p>Μετακόμιση από <b>".$fromAddress."</b> σε <b>". $toAddreess."</b> Ενδιάμεσες στάσεις: ". $stop_over ." </p>";

                      $mess.="<p>Για την Μετακόμιση θα χρειαστώ: <b>". $selectService ."</b></p><br/>";

                      $mess.="<p><b>Επιθυμητή ημερομηνία μετακόμισης: ".$myDate."</b></p><br/>";





                      $mess.="<table class=\"table-admin table-striped\"><thead><tr><th>Πληροφορίες Παλιού σπιτιού</th><th>Πληροφορίες Νέου σπιτιού</th></tr></thead><tbody>";

                      $mess.="<tr style=\"height: 30px;\"><td>".$oldHouseRange."</td><td>".$newHouseRange."</td></tr>";

                      $mess.="<tr style=\"height: 30px;\"><td>".$oldFloor."</td><td>".$newFloor."</td></tr>";

                      $mess.="<tr style=\"height: 30px;\"><td>".$oldLift."</td><td>".$newLift."</td></tr>";

                      $mess.="<tr style=\"height: 30px;\"><td>".$oldHighRoad."</td><td>".$newHighRoad."</td></tr>";

                      $mess.="<tr style=\"height: 30px;\"><td>".$oldExternalLift."</td><td>".$newExternalLift."</td></tr>";

                      $mess.="</tbody></table>";





                     /* $mess.="<br/><h4>Πληροφορίες Παλιού σπιτιού</h4>";

                      $mess.="<p>". $oldHouseRange ."</p>";

                      $mess.="<p>". $oldFloor ."</p>";

                      $mess.="<p>". $oldLift ."</p>";

                      $mess.="<p>". $oldHighRoad ."</p>";

                      $mess.="<p>". $oldExternalLift ."</p>";



                      $mess.="<br/><h4>Πληροφορίες Νέου σπιτιού</h4>";

                      $mess.="<p>". $newHouseRange ."</p>";

                      $mess.="<p>". $newFloor ."</p>";

                      $mess.="<p>". $newLift ."</p>";

                      $mess.="<p>". $newHighRoad ."</p>";

                      $mess.="<p>". $newExternalLift ."</p>";*/



                      $mess.="<br/><h3>Υπηρεσίες Μετακόμισης</h3>";

                   //   $mess.="<p>Επιλογή Αμπαλαζ: ".$epilogiAmpalaz."</p>";

                   //   $mess.="<p>Επιλογή για Λύσιμο/Δέσιμο: ".$epilogiLisimoDesimo."</p>";



                      $mess.="<p><b>".$variaAntikeimena."</b></p>";



                      $mess.="<p><b>".$antikeimenaAksias."</b></p>";



                      $mess.="<br/><h3>Πράγματα για μεταφορά</h3>";

                      $mess.="<table class=\"table-admin table-striped\"><thead><tr><th>Πράγματα</th><th>Αμπαλαζ</th><th>Λύσιμο/Δέσιμο</th></tr></thead><tbody>";

                      foreach ($myThings as $key => $value) {

                        

                        $thingTilte= $myThings[$key]['things'];

                        $thingAmpalaz= $myThings[$key]['ampalaz'];

                        $thingLisimoDesimo= $myThings[$key]['lisimoDesimo'];



                        

                        $mess.= "<tr style=\"height: 30px; border-bottom:1px solid #333;\"><td>$thingTilte</td><td>$thingAmpalaz</td><td>$thingLisimoDesimo</td></tr>";





                       }

                       $mess.="</tbody></table>";



                       $mess.="<p><b>Μήνυμα Χρήστη:</b></p><p>".$userMsg."</>";



                      

                      
                        
                      $to = "info@myconstructor.gr, giannis.pragias@gmail.com, danaiaratza@gmail.com";

                      $subject= "Φόρμα Μετακόμισης ΑΠΟ: ".$fromAddress." ΣΕ: ". $toAddreess . "Τηλ: ".$tel;

                      $headerFields = array('MIME-Version: 1.0', 'Content-Type: text/html;charset=utf-8');



                      $mail_sent = @mail( $to, $subject, $mess,implode("\r\n", $headerFields));

                        $success=true;

                     echo json_encode($success);



              }else{

                echo "lathos";

              }      



?>



    